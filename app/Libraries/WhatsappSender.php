<?php namespace App\Libraries;

use Config\Wablas;

class WhatsAppSender
{
    protected $config;

    public function __construct()
    {
        $this->config = new Wablas();
    }

    public function sendMessage($phone, $message)
    {
        $url = $this->config->apiUrl;
        $token = $this->config->token;

        // pastikan nomor WA format internasional
        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }

        $payload = [
            "data" => [
                [
                    "phone" => $phone,
                    "message" => $message,
                    "secret" => false,
                    "retry" => false,
                    "isGroup" => false
                ]
            ]
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: $token",
            "Content-Type: application/json",
        ]);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            return ['success' => false, 'error' => $err];
        }

        return json_decode($response, true);
    }
}
