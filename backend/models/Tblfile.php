<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblfile".
 *
 * @property integer $id
 * @property string $name
 * @property integer $folder_id
 *
 * @property Tblfolder $folder
 */
class Tblfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblfile';
    }

    public $files;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['folder_id', 'files'], 'required'],
            [['folder_id'], 'integer'],
            [['files'], 'file', 'maxFiles' => 5],
            [['name'], 'string', 'max' => 100],
            [['folder_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tblfolder::className(), 'targetAttribute' => ['folder_id' => 'id']],
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
            'folder_id' => 'Folder ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFolder()
    {
        return $this->hasOne(Tblfolder::className(), ['id' => 'folder_id']);
    }
}
