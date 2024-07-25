<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrap();

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Genbio2024 - Подтвердите email / Genbio2024 - Verify Email')
                ->greeting('Здравствуйте! / Hello!')
                ->line('Спасибо за регистрацию на сайте конференции GenBio2024. Нажмите на кнопку, для завершения регистрации.')
                ->line('---')
                ->line('Thank you for registration on the Genbio2024 conference website. Click on the button to complete the registration.')
                ->action('Подтвердите / Verify', $url);
        });
    }
}
