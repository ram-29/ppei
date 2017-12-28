<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblfolder".
 *
 * @property integer $id
 * @property string $name
 * @property string $date
 * @property integer $user_id
 * @property string $status
 *
 * @property User $user
 */
class Tblfolder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblfolder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date', 'user_id', 'status'], 'required'],
            [['user_id'], 'integer'],
            [['name', 'date'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 20],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Folder Name',
            'date' => 'Date',
            'user_id' => 'Created By',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
