<?php

namespace app\common\models;

use yii\behaviors\TimestampBehavior;
use yii\mongodb\ActiveRecord;

/**
 * This is the model class for collection "request".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $userId
 * @property mixed $requestStatus
 * @property mixed $createdAt
 */
class BaseRequest extends ActiveRecord
{
    const REQUEST_TYPE_FAILED     = 0;
    const REQUEST_TYPE_DONE       = 1;
    const REQUEST_TYPE_PROCESSING = 2;
    const REQUEST_TYPE_SCHEDULED  = 3;

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
        return ['api', 'request'];
    }

    /**
     * @inheritdoc
     */
    public function attributes(): array
    {
        return [
            '_id',
            'userId',
            'requestStatus',
            'createdAt',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['userId'], 'string', 'max' => 24],
            [['requestStatus'], 'integer', 'min' => 0, 'max' => 3],
            [['createdAt'], 'safe'],
            [['userId', 'requestStatus'], 'required'],
        ];
    }
}
