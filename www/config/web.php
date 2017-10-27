<?php
/**
 * Array of application config file
 */

$versioningModulesConfig = require(__DIR__ . '/mongodb.php');
$appComponentsConfig     = require(__DIR__ . '/appComponents.php');

$config = [
    'id'         => 'apiMain',
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => ['log'],
    'modules'    => $versioningModulesConfig,
    'components' => $appComponentsConfig,
    'params'     => require(__DIR__ . '/params.php')
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}


return $config;
