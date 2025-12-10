<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use PragmaRX\Google2FA\Google2FA;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Writer;


class AdminAuthController extends Controller
{
    public function generate2FA(Request $request)
    {
        $google2fa = new Google2FA();

        $secret = $google2fa->generateSecretKey();
        session(['2fa_secret_temp' => $secret]);

        $appName   = 'Kredify Loans';
        $identifier = Auth::user()->email ?? Auth::user()->phone;

        $otpAuthUrl = "otpauth://totp/{$appName}:{$identifier}?secret={$secret}&issuer={$appName}";

        $path = storage_path("app/public/2fa_qr/" . Auth::id());
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $filename = "2fa_qr.svg";
        $fullPath = $path . "/" . $filename;

        $renderer = new ImageRenderer(
            new RendererStyle(300),
            new SvgImageBackEnd()
        );

        $writer = new Writer($renderer);
        file_put_contents($fullPath, $writer->writeString($otpAuthUrl));

        $qrUrl = asset("storage/2fa_qr/" . Auth::id() . "/" . $filename);

        session(['2fa_qr' => $qrUrl]);

        return back()->with('message', 'Scan the QR code and enter the OTP to enable 2FA');
    }

    public function enable2FA(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        $secret = session('2fa_secret_temp');

        if (!$secret) {
            return back()->withErrors(['otp' => 'Session expired. Please enable 2FA again.']);
        }

        $google2fa = new Google2FA();

        $isValid = $google2fa->verifyKey($secret, $request->otp);

        if (!$isValid) {
            return back()->withErrors(['otp' => 'Invalid verification code']);
        }

        $user = Auth::user();
        $user->google2fa_secret = $secret;
        $user->google2fa_enabled = true;
        $user->save();

        session()->forget(['2fa_secret_temp', '2fa_qr']);

        return back()->with('success', 'Two-factor authentication has been enabled.');
    }

    public function disable2FA(Request $request)
    {
        $user = Auth::user();

        $user->google2fa_secret = null;
        $user->google2fa_enabled = false;
        $user->save();

        session()->forget(['2fa_secret_temp', '2fa_qr']);

        return back()->with('success', 'Two-factor authentication has been disabled.');
    }




    public function show2faLogin()
    {
        if (!session('2fa_admin_id')) {
            return redirect()->route('admin.login');
        }

        return view('auth.2fa_login');
    }

    public function verify2faLogin(Request $request)
    {
        $request->validate(['otp' => 'required|numeric']);

        $admin = User::find(session('2fa_admin_id'));

        if (!$admin) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Session expired']);
        }

        $google2fa = new Google2FA();

        $isValid = $google2fa->verifyKey($admin->google2fa_secret, $request->otp);

        if (!$isValid) {
            return back()->withErrors(['otp' => 'Invalid verification code']);
        }

        session()->forget('2fa_admin_id');

        Auth::login($admin);

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }
}
