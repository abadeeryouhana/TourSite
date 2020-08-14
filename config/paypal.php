<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
   // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
     
        'client_id'    => env('PAYPAL_SANDBOX_CLIENT_ID', null),
        'secret'      => env('PAYPAL_SANDBOX_SECRET', '')
     
    ],
    'live' => [
        
        'client_id'    => env('PAYPAL_LIVE_CLIENT_ID', ''),
        'secret'      => env('PAYPAL_LIVE_SECRET', '')
        
    ],
    'settings' => [
        'mode' => env('PAYPAL_MODE','sandbox'),
        //'http.ConnectionTimeOut' => 3000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ]

  
];
