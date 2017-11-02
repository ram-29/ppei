<?php

namespace frontend\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "tblevent".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $date
 * @property string $image_name
 * @property string $image_path
 * @property string $slug
 * @property integer $user_id
 *
 * @property Tbluser $user
 */
class Event extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'immutable' => true,
                'ensureUnique'=> true,
            ],
        ];
    }

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
            [['title', 'content', 'image_name', 'image_path', 'slug', 'user_id'], 'required'],
            [['content', 'image_path'], 'string'],
            [['date'], 'safe'],
            [['user_id'], 'integer'],
            [['title', 'image_name'], 'string', 'max' => 45],
            [['slug'], 'string', 'max' => 150],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tbluser::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'image_path' => 'Image Path',
            'slug' => 'Slug',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Tbluser::className(), ['id' => 'user_id']);
    }
}
