<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblalbum_image".
 *
 * @property integer $id
 * @property string $image_name
 * @property integer $album_id
 *
 * @property Tblalbum $album
 */
class TblalbumImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblalbum_image';
    }

    /**
     * @inheritdoc
     */

    public $imageNames;

    public function rules()
    {
        return [
            [['imageNames'], 'required'],
            [['album_id'], 'integer'],
            [['imageNames'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif', 'maxFiles' => 10],
            [['image_name'], 'string', 'max' => 100],
            [['album_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tblalbum::className(), 'targetAttribute' => ['album_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_name' => 'Image Name',
            'imageNames[]' => 'Upload Images',
            'album_id' => 'Album ID',
        ];
    }

    // public function upload($id)
    // {
    //     $albums = Tblalbum::find()->where(['id' => $id])->all();
    //     foreach ($albums as $album) 
    //     {
    //         $album_name = $album->name;
    //     }

    //     if ($this->validate()) { 
    //         foreach ($this->imageNames as $file) {
    //             $file->saveAs('uploads/images/albums/'.$album_name.'/'.$file);
    //         }
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbum()
    {
        return $this->hasOne(Tblalbum::className(), ['id' => 'album_id']);
    }

    /**
     * @inheritdoc
     * @return TblalbumImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblalbumImageQuery(get_called_class());
    }
}
