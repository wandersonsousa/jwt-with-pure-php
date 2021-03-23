<?php

namespace JWT;

function generate()
{
    //Application Key
    $key = 'hOLLY sHIT';

    //Header Token
    $header = [
        'typ' => 'JWT',
        'alg' => 'HS256'
    ];

    //Payload - Content
    $payload = [
        'exp' => (new \DateTime("now"))->getTimestamp(),
        'uid' => 1,
        'email' => 'email@email.com',
    ];

    //JSON
    $header = json_encode($header);
    $payload = json_encode($payload);

    //Base 64
    $header = base64_encode($header);
    $payload = base64_encode($payload);

    //Sign
    $sign = hash_hmac('sha256', $header . "." . $payload, $key, true);
    $sign = base64_encode($sign);

    //Token
    $token = $header . '.' . $payload . '.' . $sign;

    return $token;
}
