<?php
/**
 * Array of all app components
 */

$mongoDbConfig = require(__DIR__ . '/mongodb.php');

return [
    'mongodb' => $mongoDbConfig,
    'request' => [
        'cookieValidationKey' => 'S8K_G9z3A4Yz6Nh1jB96Cql0eYtXWusT',
        'parsers' => [
            'application/json' => 'yii\web\JsonParser',
        ]
    ],
    'cache' => [
        'class' => 'yii\caching\FileCache',
    ],
    'user' => [
        'identityClass' => 'app\common\models\UserIdentityModel',
        'enableAutoLogin' => false,
    ],
    'errorHandler' => [
        'errorAction' => 'docs/error',
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
    'urlManager' => [
        'enablePrettyUrl'     => true,
        'enableStrictParsing' => false,
        'showScriptName'      => false,

        'rules' => [
            '/' => 'docs/index',

            ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/user', 'v1/request']],
            ['class' => 'yii\rest\UrlRule', 'controller' => ['v2/user', 'v2/request']]
        ],
    ],
];