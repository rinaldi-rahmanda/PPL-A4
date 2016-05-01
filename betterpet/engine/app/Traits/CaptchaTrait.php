<?php namespace App\Traits;


use Request;
use ReCaptcha\ReCaptcha;

trait CaptchaTrait {
    public function captchaCheck()
    {

        $response = Request::get('g-recaptcha-response');
        $remoteip = $_SERVER['REMOTE_ADDR'];
        //$secret   = env('RE_CAP_SECRET');
		$secret = '6LcFFR0TAAAAAF7Te1HcafKFaxWhkesfqrlwIv2w';

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
        if ($resp->isSuccess()) {
            return true;
        } else {
            return false;
        }

    }
}