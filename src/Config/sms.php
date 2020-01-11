<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Default Driver
    |--------------------------------------------------------------------------
    |
    | This value determines which of the following gateway to use.
    | You can switch to a different driver at runtime.
    |
    */
    'default' => 'nexmo',
    /*
    |--------------------------------------------------------------------------
    | List of Drivers
    |--------------------------------------------------------------------------
    |
    | These are the list of drivers to use for this package.
    | You can change the name. Then you'll have to change
    | it in the map array too.
    |
    */
    'drivers' => [
        'sns' => [ // Install: composer require aws/aws-sdk-php
            'key' => 'Your AWS SNS Access Key',
            'secret' => 'Your AWS SNS Secret Key',
            'region' => 'Your AWS SNS Region',
            'sender' => 'Your AWS SNS Sender ID',
            'type' => 'Tansactional', // Or: 'Promotional'
        ],
        'nexmo' => [ // Install: composer require nexmo/client
            'key' => 'Your Nexmo API Key',
            'secret' => 'Your Nexmo API Secret',
            'from' => 'Your Nexmo From Number',
        ],
        'twilio' => [ // Install: composer require twilio/sdk
            'sid' => 'Your SID',
            'token' => 'Your Token',
            'from' => 'Your Default From Number',
        ],
        'clockwork' => [ // Install: composer require mediaburst/clockworksms
            'key' => 'Your clockwork API Key',
        ]
    ],
    /*
    |--------------------------------------------------------------------------
    | Class Maps
    |--------------------------------------------------------------------------
    |
    | This is the array of Classes that maps to Drivers above.
    | You can create your own driver if you like and add the
    | config in the drivers array and the class to use for
    | here with the same name. You will have to extend
    | Tzsk\Sms\Abstracts\Driver in your driver.
    |
    */
    'map' => [
        'sns' => \Panobit\SmsGateway\Drivers\Sns::class,
        'nexmo' => \Panobit\SmsGateway\Drivers\Nexmo::class,
        'twilio' => \Panobit\SmsGateway\Drivers\Twilio::class,
        'clockwork' => \Panobit\SmsGateway\Drivers\Clockwork::class
    ]
];
