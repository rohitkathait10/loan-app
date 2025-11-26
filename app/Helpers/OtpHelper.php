<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OtpHelper
{
    public static function sendOtp($phone, $otp)
    {
        $apiKey = env('TWO_FACTOR_API_KEY');

        $url = "https://2factor.in/API/V1/$apiKey/SMS/+91$phone/$otp/Phone_Verification_OTP";

        $response = Http::get($url);

        Log::info('2Factor SMS ONLY OTP Debug', [
            'url' => $url,
            'phone' => $phone,
            'otp' => $otp,
            'response_status' => $response->status(),
            'response_body' => $response->body(),
        ]);

        return $response->json();
    }
}
