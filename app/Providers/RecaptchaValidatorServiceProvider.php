<?php

namespace App\Providers;

use ReCaptcha\ReCaptcha;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Request;

class RecaptchaValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        Validator::extend('captcha', function ($attribute, $value, $parameters, $validator) {
            //$ip = request()->getClientIp();
            //$ip = Request::getClientIp();
            $ip = $this->app['request']->getClientIp();
            $recaptcha = new ReCaptcha(env('INVISIBLE_RECAPTCHA_SECRETKEY'));
            $resp = $recaptcha->verify($value, $ip);

            return $resp->isSuccess();
        });
    }
}