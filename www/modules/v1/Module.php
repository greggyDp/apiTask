<?php

namespace app\modules\v1;

use yii\base\Module as BaseModule;

/**
 * Class Module
 * @package app\modules\forum
 */
class Module extends BaseModule
{
    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }
}