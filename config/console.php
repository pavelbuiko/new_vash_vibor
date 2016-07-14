<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

return [
    'id' => 'basic-console',    
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'app\commands',
    'modules' => [
        'gii' => [
            'class'         => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.178.20'], 
            //*
            'generators'    => [
                'texts' => [
                    'class' => 'app\generateCode\TextsBackend\Generator',
                    'templates' => [
                        'texts' => '@app/generateCode/TextsBackend/default',
                    ]                    
                ],
                'photos'    => [
                    'class' => 'app\generateCode\PhotosBackend\Generator',
                    'templates' => [
                        'photos' => '@app/generateCode/PhotosBackend/default',
                    ],
                ],
            ]//*/
        ]
    ],
];
