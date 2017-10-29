<?php

namespace app\common\controllers;

use yii\base\InvalidParamException;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Class BaseAbstractApiController
 * @package app\common\controllers
 */
class BaseApiController extends ActiveController
{
    /**
     * @var $appToken string
     */
    private $appToken;

    /**
     * @param \yii\base\Action $action
     * @return bool
     */
    public function beforeAction($action): bool
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $this->setAppToken();

        if (!$this->isValidAppToken()) {
            throw new InvalidParamException('appToken is invalid!');
        }

        return parent::beforeAction($action);
    }

    /**
     * @return string
     */
    public function getAppToken(): string
    {
        return $this->appToken;
    }

    /**
     * @return bool
     */
    protected function isValidAppToken(): bool
    {
        return (bool) ($this->appToken == \Yii::$app->params['appToken']);
    }

    /**
     * @throws NotFoundHttpException
     */
    private function setAppToken()
    {
        $appToken = (string) \Yii::$app->request->get('appToken');

        if (empty($appToken)) {
            throw new NotFoundHttpException('appToken does not set!');
        }

        $this->appToken = $appToken;
    }
}