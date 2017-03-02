<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "status".
 *
 * @property integer $id
 * @property string $message
 * @property integer $permissions
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 */
class Status extends ActiveRecord
{

    const PERMISSIONS_PRIVATE = 10;
    const PERMISSIONS_PUBLIC = 20;

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'message'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message', 'created_at', 'updated_at', 'created_by', 'permissions'], 'required'],
            [['message'], 'string'],
            [['permissions', 'created_at', 'updated_at', 'created_by'], 'integer'],
        ];
    }

    public function getPermissions()
    {
        return [self::PERMISSIONS_PRIVATE => 'Private', self::PERMISSIONS_PUBLIC => 'Public'];
    }

    public function getPermissionsLabel($perm)
    {
        if ($perm == self::PERMISSIONS_PUBLIC) {
            return 'Public';
        } else {
            return 'Private';
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'message' => Yii::t('app', 'Message'),
            'permissions' => Yii::t('app', 'Permissions'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }

    public function getOwner()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
