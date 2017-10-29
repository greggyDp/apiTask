<?php
/**
 * Array of application config file
 */

$versioningModulesConfig = require(__DIR__ . '/versioningModules.php');
$appComponentsConfig     = require(__DIR__ . '/appComponents.php');
$appParams               = require(__DIR__ . '/params.php');

$config = [
    'id'         => 'apiMain',
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => ['log'],
    'modules'    => $versioningModulesConfig,
    'components' => $appComponentsConfig,
    'params'     => $appParams
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
            'mongoDbModel' => [
                'class' => 'yii\mongodb\gii\model\Generator'
            ]
        ],
        'allowedIPs' => ['*'],
    ];
}


return $config;
