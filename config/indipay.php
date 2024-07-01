<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Indipay Service Config
    |--------------------------------------------------------------------------
    |   gateway = CCAvenue / PayUMoney / EBS / Citrus / InstaMojo / ZapakPay / Paytm / Mocker
    */

    'gateway' => 'Mocker',                // Replace with the name of default gateway you want to use

    'testMode'  => false,                   // True for Testing the Gateway [For production false]

    'ccavenue' => [                         // CCAvenue Parameters
        'merchantId' => env('CCAVENUE_MERCHANT_ID', '230367'),
        'accessCode' => env('CCAVENUE_ACCESS_CODE', 'AVNH87GH43CF73HNFC'),
        'workingKey' => env('CCAVENUE_WORKING_KEY', 'B5A356D75A12E310F2387307F0AB031B'),

        // Should be route address for url() function
        'redirectUrl' => env('INDIPAY_REDIRECT_URL', 'indipay/response'),
        'cancelUrl' => env('INDIPAY_CANCEL_URL', 'indipay/response'),

        'currency' => env('INDIPAY_CURRENCY', 'USD'),
        'language' => env('INDIPAY_LANGUAGE', 'EN'),
    ],

    'payumoney' => [                         // PayUMoney Parameters
        'merchantKey'  => env('INDIPAY_MERCHANT_KEY', ''),
        'salt'  => env('INDIPAY_SALT', ''),
        'workingKey' => env('INDIPAY_WORKING_KEY', ''),

        // Should be route address for url() function
        'successUrl' => env('INDIPAY_SUCCESS_URL', 'indipay/response'),
        'failureUrl' => env('INDIPAY_FAILURE_URL', 'indipay/response'),
    ],

    'ebs' => [                         // EBS Parameters
        'account_id'  => env('INDIPAY_MERCHANT_ID', ''),
        'secretKey' => env('INDIPAY_WORKING_KEY', ''),

        // Should be route address for url() function
        'return_url' => env('INDIPAY_SUCCESS_URL', 'indipay/response'),
    ],

    'citrus' => [                         // Citrus Parameters
        'vanityUrl'  => env('INDIPAY_CITRUS_VANITY_URL', ''),
        'secretKey' => env('INDIPAY_WORKING_KEY', ''),

        // Should be route address for url() function
        'returnUrl' => env('INDIPAY_SUCCESS_URL', 'indipay/response'),
        'notifyUrl' => env('INDIPAY_SUCCESS_URL', 'indipay/response'),
    ],

    'instamojo' =>  [
        'api_key' => env('INSTAMOJO_API_KEY',''),
        'auth_token' => env('INSTAMOJO_AUTH_TOKEN',''),
        'redirectUrl' => env('INDIPAY_REDIRECT_URL', 'indipay/response'),
    ],

    'mocker' =>  [
        'service' => env('MOCKER_SERVICE','default'),
        'redirect_url' => env('MOCKER_REDIRECT_URL', 'indipay/response'),
    ],

    'zapakpay' =>  [
        'merchantIdentifier' => env('ZAPAKPAY_MERCHANT_ID',''),
        'secret' => env('ZAPAKPAY_SECRET', ''),
        'returnUrl' => env('ZAPAKPAY_RETURN_URL', 'indipay/response'),
    ],

    'paytm' =>  [
        'MERCHANT_KEY' => env('PAYTM_MERCHANT_KEY',''),
        'MID' => env('PAYTM_MID', ''),
        'CHANNEL_ID' => env('PAYTM_CHANNEL_ID', 'WEB'),
        'WEBSITE' => env('PAYTM_WEBSITE', 'WEBSTAGING'),
        'INDUSTRY_TYPE_ID' => env('PAYTM_INDUSTRY_TYPE_ID', 'Retail'),
        'REDIRECT_URL' => env('PAYTM_REDIRECT_URL', 'indipay/response'),
    ],

    // Add your response link here. In Laravel 5.2+ you may use the VerifyCsrf Middleware.
    'remove_csrf_check' => [
        'indipay/response'
    ],





];
