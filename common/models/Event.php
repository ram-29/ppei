<?php

namespace common\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "tblevent".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $date
 * @property string $image_name
 * @property string $slug
 * @property integer $user_id
 *
 * @property Tbluser $user
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblevent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'image_name', 'slug', 'user_id'], 'required'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['user_id'], 'integer'],
            [['title', 'image_name'], 'string', 'max' => 145],
            [['slug'], 'string', 'max' => 145],
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
            'title' => 'Title',
            'content' => 'Content',
            'date' => 'Date',
            'image_name' => 'Image Name',
            'slug' => 'Slug',
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
}
