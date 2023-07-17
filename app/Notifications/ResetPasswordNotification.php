<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;


class ResetPasswordNotification extends ResetPassword
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reset Password')
            ->line('Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda.')
            ->action('Reset Password', url(config('app.url').route('password.reset', $this->token, false)))
            ->line('Jika Anda tidak melakukan permintaan reset password, tidak perlu melakukan tindakan lebih lanjut.');
    }
}
