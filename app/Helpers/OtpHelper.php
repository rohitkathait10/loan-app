<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class OtpHelper
{
    public static function sendOtp($phone, $template = "Phone_Verification_OTP")
    {
        $apiKey = env('TWO_FACTOR_API_KEY');

        $url = "https://2factor.in/API/V1/$apiKey/SMS/+91$phone/AUTOGEN/$template";

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
