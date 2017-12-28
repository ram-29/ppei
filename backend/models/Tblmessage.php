<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblmessage".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property string $date
 */
class Tblmessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblmessage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'notification', 'email', 'subject', 'message', 'date'], 'required'],
            [['message'], 'string'],
            [['date'], 'safe'],
            [['name', 'email'], 'string', 'max' => 45],
            [['subject'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'subject' => 'Subject',
            'message' => 'Message',
            'date' => 'Date',
        ];
    }
}
