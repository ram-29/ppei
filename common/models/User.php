<?php

namespace common\models;

use Yii;
use common\models\Album;
use common\models\Event;

/**
 * This is the model class for table "tbluser".
 *
 * @property integer $id
 * @property string $full_name
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Tblactivity[] $tblactivities
 * @property Tblalbum[] $tblalbums
 * @property Tblevent[] $tblevents
 * @property Tblstory[] $tblstories
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbluser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_name', 'username', 'auth_key', 'password_hash', 'email', 'status', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['full_name'], 'string', 'max' => 100],
            [['username', 'auth_key', 'email'], 'string', 'max' => 45],
            [['password_hash', 'password_reset_token'], 'string', 'max' => 145],
            [['email'], 'unique'],
            [['username'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblactivities()
    {
        return $this->hasMany(Tblactivity::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Album::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblstories()
    {
        return $this->hasMany(Tblstory::className(), ['user_id' => 'id']);
    }
}
