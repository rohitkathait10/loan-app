<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OtpHelper
{
    public static function sendOtp($phone)
    {
        $apiKey = env('TWO_FACTOR_API_KEY');

        $url = "https://2factor.in/API/V1/$apiKey/SMS/+91$phone/AUTOGEN/Phone_Verification_OTP";

        $response = Http::get($url);

        return $response->json();
    }

    public static function verifyOtp($sessionId, $otp)
    {
        $apiKey = env('TWO_FACTOR_API_KEY');

        $url = "https://2factor.in/API/V1/$apiKey/SMS/VERIFY/$sessionId/$otp";

        $response = Http::get($url);

        return $response->json();
    }
}
