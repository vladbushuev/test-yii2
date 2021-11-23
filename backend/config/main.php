<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

$config = [
    'id' => 'testyii2-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',

    'bootstrap' => [
        'log',
    ],

    'components' => [
        'request' => [
            'baseUrl' => '/admin',
            'csrfParam' => 'testyii2_csrf-backend',
            'cookieValidationKey' => '7u5UJSFI3A',
        ],
        'session' => [
            'name' => 'testyii2-backend',
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
            'rules' => [
                '/login' => '/site/login',
                '/' => '/books/index',
            ],
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => '/',
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules' => require __DIR__ . '/../../frontend/config/url_rules.php',
        ],
        'user' => [
            'identityClass' => 'backend\models\User',
            'enableAutoLogin' => true,
        ],
    ],
    'params' => $params,
];

return $config;
