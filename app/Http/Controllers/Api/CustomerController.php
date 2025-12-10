<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use App\Models\City;
use App\Models\State;
use Illuminate\Support\Facades\Mail;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Helpers\OtpHelper;

class CustomerController extends Controller
{

    protected function safeExecute(\Closure $callback)
    {
        try {
            return $callback();
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Resource not found.',
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong. Please try again later.',
            ], 500);
        }
    }
    public function register(Request $request)
    {
        return $this->safeExecute(function () use ($request) {

            $ENABLE_OTP = true;

            $validated = $request->validate([
                'name'              => 'required|string|max:255',
                'phone'             => 'required|digits:10|numeric',
                'loan_type'         => 'required|string|in:business,personal',
                'ref'               => 'nullable|string',
                
                'terms_accepted'    => 'required|accepted',
                'marketing_consent' => 'required|accepted', 
            ]);

            if (User::where('phone', $validated['phone'])->exists()) {
                return response()->json([
                    'status'       => 'success',
                    'message'      => 'Customer already registered.',
                    'next_action'  => 'login',
                ]);
            }

            // Detect device, OS, browser
            $userAgent = $request->header('User-Agent');
            $ip        = $request->ip();

            $browser = match (true) {
                str_contains($userAgent, 'Chrome')  => 'Chrome',
                str_contains($userAgent, 'Firefox') => 'Firefox',
                str_contains($userAgent, 'Safari')  => 'Safari',
                str_contains($userAgent, 'MSIE'),
                str_contains($userAgent, 'Trident') => 'Internet Explorer',
                default                              => 'Unknown',
            };

            $os = match (true) {
                str_contains($userAgent, 'Windows') => 'Windows',
                str_contains($userAgent, 'Mac')     => 'Mac OS',
                str_contains($userAgent, 'Linux')   => 'Linux',
                str_contains($userAgent, 'Android') => 'Android',
                str_contains($userAgent, 'iPhone')  => 'iOS',
                default                              => 'Unknown',
            };

            $device = preg_match('/Mobile|Android|iPhone|iPad|Tablet/i', $userAgent)
                ? 'Mobile'
                : 'Desktop';

            // Referral
            $ref       = $validated['ref'] ?? null;
            $validRef  = $ref ? User::where('referral_code', $ref)->first() : null;

            // Customer check
            $customer = Customer::where('phone', $validated['phone'])->first();

            $commonUpdates = [
                'name'        => $validated['name'],
                'loan_type'   => $validated['loan_type'],
                'ip_address'  => $ip,
                'browser'     => $browser,
                'os'          => $os,
                'device_type' => $device,
            ];

            if ($validRef) {
                $commonUpdates['referred_by'] = $ref;
            }
            
            $template = "Phone_Verification_OTP";

            if ($customer) {

                if ($customer->is_otp_verify) {

                    $customer->update($commonUpdates);

                    return response()->json([
                        'status'       => 'success',
                        'message'      => 'Customer already verified.',
                        'next_action'  => 'get_customer_mail',
                        'id'           => $customer->id,
                    ]);
                }

                $otpResponse = $ENABLE_OTP
                    ? OtpHelper::sendOtp($validated['phone'], $template)
                    : ['Details' => 'OTP_DISABLED'];

                $customer->update(array_merge($commonUpdates, [
                    'otp_session' => $otpResponse['Details'],
                ]));

                return response()->json([
                    'status'       => 'success',
                    'message'      => $ENABLE_OTP ? 'OTP sent successfully.' : 'OTP disabled. Dummy session used.',
                    'next_action'  => 'verify_otp',
                    'id'           => $customer->id,
                ]);
            }
                
            $otpResponse = $ENABLE_OTP
                ? OtpHelper::sendOtp($validated['phone'], $template)
                : ['Details' => 'OTP_DISABLED'];

            $newCustomer = Customer::create(array_merge($commonUpdates, [
                'phone'       => $validated['phone'],
                'otp_session' => $otpResponse['Details'],
                'terms_accepted'     => 1,
                'marketing_consent'  => 1,
                'consent_given_at'   => now(),  
            ]));

            return response()->json([
                'status'       => 'success',
                'message'      => $ENABLE_OTP ? 'Customer registered successfully.' : 'Customer registered (OTP disabled).',
                'next_action'  => 'verify_otp',
                'id'           => $newCustomer->id,
            ], 201);
        });
    }

    public function resendOtp(Request $request, $id)
    {
        return $this->safeExecute(function () use ($request, $id) {

            $ENABLE_OTP = true;

            $customer = Customer::findOrFail($id);

            if ($customer->is_otp_verify) {
                return response()->json([
                    'status'      => 'success',
                    'message'     => 'Customer already verified.',
                    'next_action' => 'get_customer_mail',
                    'id'          => $customer->id,
                ]);
            }

            $otpResponse = $ENABLE_OTP
                ? OtpHelper::sendOtp($customer->phone)
                : ['Details' => 'OTP_DISABLED'];

            $customer->otp_session = $otpResponse['Details'];
            $customer->save();

            return response()->json([
                'status'      => 'success',
                'message'     => $ENABLE_OTP ? 'OTP resent successfully.' : 'OTP disabled. Dummy session used.',
                'next_action' => 'verify_otp',
                'id'          => $customer->id,
            ]);
        });
    }

    public function otpVerify(Request $request, $id)
    {
        return $this->safeExecute(function () use ($request, $id) {

            $validated = $request->validate([
                'otp' => 'required|numeric',
            ]);

            $customer = Customer::findOrFail($id);

            // if ($validated['otp'] == 123456) {
            //     $customer->is_otp_verify = 1;
            //     $customer->save();

            //     return response()->json([
            //         'status' => 'success',
            //         'message' => 'OTP verified successfully.',
            //         'next_action' => 'get_customer_mail',
            //         'id' => $customer->id,
            //     ], 200);
            // }

            $verifyResponse = OtpHelper::verifyOtp($customer->otp_session, $validated['otp']);

            if (!empty($verifyResponse['Status']) && $verifyResponse['Status'] == "Success") {
                $customer->is_otp_verify = 1;
                $customer->save();

                return response()->json([
                    'status' => 'success',
                    'message' => 'OTP verified successfully.',
                    'next_action' => 'get_customer_mail',
                    'id' => $customer->id,
                ]);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'Invalid OTP!',
            ], 400);
        });
    }

    public function storeCustomerMail(Request $request, $id)
    {
        return $this->safeExecute(function () use ($request, $id) {

            $validated = $request->validate([
                'email' => 'required|email',
                'loan_amount' => 'required|numeric',
                'salary_type' => 'required|string',
            ]);

            $customer = Customer::findOrFail($id);

            $emailExists = Customer::where('email', $validated['email'])
                ->where('id', '!=', $id)
                ->exists();

            if ($emailExists) {
                return response()->json([
                    'status' => 'false',
                    'message' => 'This email is already associated with another customer.',
                ], 409);
            }

            $customer->email = $validated['email'];
            $customer->loan_amount = $validated['loan_amount'];
            $customer->salary_type = $validated['salary_type'];
            $customer->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Customer mail and details stored successfully.',
                'customer' => $customer
            ], 200);
        });
    }


    public function getStates()
    {
        $states = State::where('country_id', 105)->get();
        return response()->json($states);
    }

    public function getCities($state_id)
    {
        $cities = City::where('state_id', $state_id)->get();
        return response()->json($cities);
    }

    public function storeEligibility(Request $request, $id)
    {
        return $this->safeExecute(function () use ($request, $id) {

            $validated = $request->validate([
                'cibil_score' => 'required|integer',
                'monthly_income' => 'required|numeric|min:15000',
                'monthly_emi' => 'required|numeric|min:0',
                'loan_purpose' => 'required|string',
                'state' => 'required|numeric',
                'city' => 'required|numeric',
            ]);

            $customer = Customer::findOrFail($id);

            $cibilScore = $validated['cibil_score'];
            $monthlyIncome = $validated['monthly_income'];
            $monthlyEMI = $validated['monthly_emi'];
            $loanPurpose = strtolower($validated['loan_purpose']);

            if ($monthlyIncome >= 15000 && $monthlyIncome < 20000) {
                $dbr = 0.4;
            } elseif ($monthlyIncome >= 20000 && $monthlyIncome < 30000) {
                $dbr = 0.5;
            } else {
                $dbr = 0.55;
            }

            $maxEMI = ($monthlyIncome * $dbr) - $monthlyEMI;
            $interestRate = 15 / 12 / 100;

            $calculateLoanAmount = function ($emi, $interestRate, $months) {
                return ($emi * (pow(1 + $interestRate, $months) - 1)) / ($interestRate * pow(1 + $interestRate, $months));
            };

            $calculateEMI = function ($loanAmount, $interestRate, $months) {
                return ($loanAmount * $interestRate * pow(1 + $interestRate, $months)) / (pow(1 + $interestRate, $months) - 1);
            };

            $maxLoan = $calculateLoanAmount($maxEMI, $interestRate, 36);
            $emi36 = $calculateEMI($maxLoan, $interestRate, 36);
            $emi48 = $calculateEMI($maxLoan, $interestRate, 48);
            $emi60 = $calculateEMI($maxLoan, $interestRate, 60);

            $customer->update([
                'cibil_score' => $cibilScore,
                'monthly_income' => $monthlyIncome,
                'monthly_emi' => $monthlyEMI,
                'loan_purpose' => $loanPurpose,
                'city_id' => $validated['city'],
                'state_id' => $validated['state'],
                'loan_eligibility' => $maxLoan,
                'emi_36' => $emi36,
                'emi_48' => $emi48,
                'emi_60' => $emi60,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Eligibility details stored successfully.',
                'data' => [
                    'customer' => $customer,
                    'eligibility' => [
                        'max_loan' => round($maxLoan, 2),
                        'emi_36' => round($emi36, 2),
                        'emi_48' => round($emi48, 2),
                        'emi_60' => round($emi60, 2),
                    ],
                ],
            ], 200);
        });
    }

    public function storeApproval(Request $request, $id)
    {
        return $this->safeExecute(function () use ($request, $id) {

            $validated = $request->validate([
                'emiOption' => 'required|in:36,48,60',
            ]);

            $customer = Customer::findOrFail($id);

            $customer->selected_emi = $validated['emiOption'];
            $customer->save();

            return response()->json([
                'status' => 'success',
                'message' => 'EMI option stored successfully.',
                'data' => [
                    'customer_id' => $customer->id,
                    'selected_emi' => $customer->selected_emi,
                ],
            ], 200);
        });
    }

    public function contactSubmit(Request $request)
    {
        return $this->safeExecute(function () use ($request) {

            if (!empty($request->website)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Not authorized.',
                ], 403);
            }

            $request->validate([
                'name'    => 'required|string',
                'phone'   => ['required', 'regex:/^[0-9]{10}$/'],
                'email'   => 'required|email',
                'subject' => 'required|string',
                'message' => 'required|string',
            ]);

            $sanitizedSubject = strip_tags(trim($request->subject));
            $sanitizedMessage = strip_tags(trim($request->message));

            $ip = $request->ip();
            $userAgent = $request->userAgent();

            // Default Location
            $location = 'Unknown';
            try {
                $geo = Http::get("http://ip-api.com/json/{$ip}?fields=country,city,status");
                if ($geo->json('status') === 'success') {
                    $location = $geo->json('city') . ', ' . $geo->json('country');
                }
            } catch (\Exception $e) {
            }

            // Browser Detection
            if (strpos($userAgent, 'Chrome') !== false) $browser = 'Chrome';
            elseif (strpos($userAgent, 'Firefox') !== false) $browser = 'Firefox';
            elseif (strpos($userAgent, 'Safari') !== false && strpos($userAgent, 'Chrome') === false) $browser = 'Safari';
            elseif (strpos($userAgent, 'MSIE') !== false || strpos($userAgent, 'Trident') !== false) $browser = 'Internet Explorer';
            else $browser = 'Unknown';

            // OS Detection
            if (strpos($userAgent, 'Windows') !== false) $os = 'Windows';
            elseif (strpos($userAgent, 'Mac') !== false) $os = 'Mac OS';
            elseif (strpos($userAgent, 'Linux') !== false) $os = 'Linux';
            elseif (strpos($userAgent, 'Android') !== false) $os = 'Android';
            elseif (strpos($userAgent, 'iPhone') !== false || strpos($userAgent, 'iPad') !== false) $os = 'iOS';
            else $os = 'Unknown';

            // Device Type
            $device = preg_match('/Mobile|Android|iPhone|iPad|Tablet/i', $userAgent) ? 'Mobile' : 'Desktop';

            $deviceInfo = "$browser on $os ($device)";

            $enquiry = Enquiry::create([
                'name'        => $request->name,
                'phone'       => $request->phone,
                'email'       => $request->email,
                'subject'     => $sanitizedSubject,
                'message'     => $sanitizedMessage,
                'ip_address'  => $ip,
                'user_agent'  => $userAgent,
                'device_info' => $deviceInfo,
                'location'    => $location,
            ]);

            Mail::send('emails.contact', [
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'user_message' => $sanitizedMessage,
            ], function ($message) use ($request) {
                $message->to(env('CONTACT_RECEIVER_EMAIL'))
                    ->subject('New Contact Message from ' . $request->name);
            });

            return response()->json([
                'status' => 'success',
                'message' => 'Thank you for contacting us. We’ll get back to you soon!',
                'next_action' => 'close_form_or_redirect',
                'data' => [
                    'enquiry_id' => $enquiry->id,
                ],
            ], 200);
        });
    }
}
