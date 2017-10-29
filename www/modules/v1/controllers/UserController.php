<?php

namespace app\modules\v1\controllers;

use app\common\controllers\BaseUserController;
use app\modules\v1\models\User;

/**
 * Class UserController
 * @package app\modules\v1\controllers
 */
class UserController extends BaseUserController
{
    public $modelClass = 'app\modules\v1\models\User';

    /**
     * All users list ==========================> //for demo
     * @return array|\yii\mongodb\ActiveRecord
     */
    public function actionAll()
    {
        $models = User::find()->all();
        return $models;
    }
}