<?php
return [ 
    'client_id' => env('PAYPAL_CLIENT_ID','AUQmlgPX1slSMRwU8-uX98CTJq_kw2cZxjiWmi2DzWhP28q413ZT2o7Z4kBYD1zqKXSsELDY_RJnIKQv'),
    'secret' => env('PAYPAL_SECRET','EJXNtz8LQyv59xWv0xZ6VKuYUjbSpVUbotSjqetD3fHmjoj5vbKoiOfaGn9fasQoXX5yzkCNiNo3SNK8'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE','Live'),
        'http.ConnectionTimeOut' => 1200,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];