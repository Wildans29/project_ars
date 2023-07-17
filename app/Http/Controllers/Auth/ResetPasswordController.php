<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\Str;


class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected function rules()
    {

        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }

    protected function validationErrorMessages()
    {

        return [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus valid',
            'token.required' => 'Token reset password tidak valid',
            'password.required' => 'Password harus diisi',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'password.min' => 'Password minimal terdiri dari 8 karakter',
        ];
    }

    protected function sendResetResponse(Request $request, $response)
    {

        return redirect()->route('login')->with('status', trans($response));
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans($response)]);
    }
}
