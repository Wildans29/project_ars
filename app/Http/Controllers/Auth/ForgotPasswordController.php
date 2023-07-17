<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Models\Setting; // Sesuaikan dengan model Setting Anda
use Illuminate\Support\Str as Helpers;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        $setting = Setting::first(); // Ambil nilai $setting dari model Setting

        return view('auth.passwords.email', compact('setting'));
    }
}
