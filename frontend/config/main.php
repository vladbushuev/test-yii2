<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

$config = [
    'id' => 'testyii2-frontend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',

    'bootstrap' => [
        'log',
    ],

    'components' => [
        'request' => [
            'baseUrl' => '',
            'csrfParam' => 'testyii2_csrf-frontend',
            'cookieValidationKey' => '7mvOjc5u4Z',
        ],
        'session' => [
            'name' => 'testyii2-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => require __DIR__ . '/url_rules.php',
        ],
    ],
    'params' => $params,
];

return $config;
