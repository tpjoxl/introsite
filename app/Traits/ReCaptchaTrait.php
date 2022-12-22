<?php

namespace App\Traits;

use ReCaptcha\ReCaptcha;
use Illuminate\Support\Facades\Request;

trait ReCaptchaTrait
{
    public function ReCaptchaCheck()
    {
        $gRecaptchaResponse = request()->input('g-recaptcha-response');
        $remoteIp = Request::ip();
        $secret = env('RE_CAP_SECRET');

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha
            // ->setExpectedHostname(env('RE_CAP_HOST'))
            ->verify($gRecaptchaResponse, $remoteIp);
        if ($resp->isSuccess()) {
            return [
                'status' => true,
            ];
        } else {
            $errors = $resp->getErrorCodes();
            return [
                'status' => false,
                'errors' => $errors,
            ];
        }
    }
}
