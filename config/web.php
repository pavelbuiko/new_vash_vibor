<?php

$config = [    
    'components' => [
        'defaultRoute' => 'main/default/index',


        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,            
        ],
        'user' => [
            'identityClass' => 'app\modules\user\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['user/default/login'],
        ],        
        'errorHandler' => [
            'errorAction' => 'main/default/error',
        ],
        'mail'=> [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'localhost',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'conyrollerNamespace' =>'frontend/controllers',
        'request' => [          
            'cookieValidationKey' => 'q-IJ-YKxsHRGRw4NuhSveF1YR7JaMNcB',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'rules' => [
               'our-team'=>'main/default/command'
            ],
            // ...
        ]

       /* 'urlManager' => [
           //'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                '/' => 'main/dsdsdg/command',
            ],
        ],*/


    ],        
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
