<?php

namespace app\modules\v1\controllers;

use app\common\controllers\BaseRequestController;
use app\modules\v1\models\Request;

/**
 * Class RequestController
 * @package app\modules\v1\controllers
 */
class RequestController extends BaseRequestController
{
    public $modelClass = 'app\modules\v1\models\Request';

    /**
     * All users list ==========================> //for demo
     * @return array|\yii\mongodb\ActiveRecord
     */
    public function actionAll()
    {
        $models = Request::find()->all();
        return $models;
    }
}