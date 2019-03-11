<?php

return [


    'driver' => env('MAIL_DRIVER', 'smtp'),


    'host' => env('MAIL_HOST', 'smtp.gmail.com'),


    'port' => env('MAIL_PORT', 25),


    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'cheng19941029@gnail.com'),
        'name' => env('MAIL_FROM_NAME', 'testuser'),
    ],


    'encryption' => env('MAIL_ENCRYPTION', 'tls'),

    'username' => env('MAIL_USERNAME'),

    'password' => env('MAIL_PASSWORD'),


    'sendmail' => '/usr/sbin/sendmail -bs',


    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],



    'log_channel' => env('MAIL_LOG_CHANNEL'),

];
