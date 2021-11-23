<?php

$config = [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'Europe/Moscow',
    'language' => 'ru-RU',
    'sourceLanguage' => 'ru-RU',

    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],

    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=test-yii2',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            //'enableSchemaCache' => true,
            //'schemaCacheDuration' => 3600,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];

return $config;
