<?php

namespace App\Services;

use App\Model\Malath;
use Carbon\Carbon;
use GuzzleHttp\Client;

class SMSClient
{
    private $url = 'http://sms.malath.net.sa/httpSmsProvider.aspx';

    public function send($numbers, $message)
    {
        $client = new Client();
        $malath = Malath::latest()->first();
        $res = $client->post($this->url, ['form_params' => [
            'username' => $malath->username,
            'password' => $malath->password,
            'sender' => $malath->sender,
            'mobile' => $numbers,
            'message' => $message,
            'unicode' => 'U',
        ]]);

        return $res->getBody();
    }
}
