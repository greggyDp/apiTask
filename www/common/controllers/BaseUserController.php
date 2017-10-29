<?php

namespace app\common\controllers;

/**
 * Class BaseUserController
 * @package app\common\controllers
 */
class BaseUserController extends BaseApiController
{
    /**
     * @inheritdoc
     * @return array
     */
    public function actions(): array
    {
        $actions = parent::actions();
        unset($actions['delete'], $actions['update']);

        return $actions;
    }
}