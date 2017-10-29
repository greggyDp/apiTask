<?php

namespace app\common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\mongodb\ActiveRecord;

/**
 * This is the model class for collection "user".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $authToken
 * @property mixed $email
 * @property mixed $createdAt
 */
class BaseUser extends ActiveRecord
{
    /**
     * @inheritdoc
     * @return array
     */
    public function behaviors(): array
    {
        return [
            [
                'class'              => TimestampBehavior::className(),
                'createdAtAttribute' => 'createdAt',
                'updatedAtAttribute' => false,
                'value'              => date('Y-m-d'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function collectionName(): array
    {
        return ['api', 'user'];
    }

    /**
     * @inheritdoc
     */
    public function attributes(): array
    {
        return [
            '_id',
            'authToken',
            'createdAt'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['authToken'], 'string', 'max' => Yii::$app->params['authTokenLength']],
            [['createdAt'], 'safe'],
        ];
    }

    /**
     * @param string $authToken
     * @return bool
     */
    public function authUser(string $authToken): bool
    {
        return (bool) self::findOne(['authToken' => $authToken]);
    }

    /**
     * @inheritdoc
     *
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert): bool
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        $this->authToken = $this->generateUniqueAuthToken();

        return true;
    }

    /**
     * @return string
     */
    private function generateUniqueAuthToken(): string
    {
        $authToken = Yii::$app
            ->getSecurity()
            ->generateRandomString(Yii::$app->params['authTokenLength']);

        if ((bool) self::findOne(['authToken' => $authToken])) {
            return $this->generateUniqueAuthToken();
        }

        return $authToken;
    }
}
