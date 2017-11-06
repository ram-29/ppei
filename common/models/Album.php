<?php

namespace common\models;

use Yii;
use common\models\User;
use common\models\Image;

/**
 * This is the model class for table "tblalbum".
 *
 * @property integer $id
 * @property string $name
 * @property string $event_date
 * @property string $posted_date
 * @property integer $user_id
 *
 * @property Tbluser $user
 * @property TblalbumImage[] $tblalbumImages
 */
class Album extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblalbum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'event_date', 'user_id'], 'required'],
            [['event_date', 'posted_date'], 'safe'],
            [['user_id'], 'integer'],
            [['name'], 'string', 'max' => 200],
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
            'name' => 'Name',
            'event_date' => 'Event Date',
            'posted_date' => 'Posted Date',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['album_id' => 'id']);
    }
}
