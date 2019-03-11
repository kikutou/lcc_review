<?php

return [


    'driver' => env('MAIL_DRIVER', 'smtp'),


    'host' => env('MAIL_HOST', 'smtp.gmail.com'),


    'port' => env('MAIL_PORT',587),


    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'cheng19941029@gmail.com'),
        'name' => env('MAIL_FROM_NAME', 'testemail'),
    ],


    'encryption' => env('MAIL_ENCRYPTION', 'tls'),

    'username' => env('MAIL_USERNAME','cheng19941029@gmail.com'),

    'password' => env('MAIL_PASSWORD','Asd2436492934'),


    'sendmail' => '/usr/sbin/sendmail -bs',


    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],



    'log_channel' => env('MAIL_LOG_CHANNEL'),

];
