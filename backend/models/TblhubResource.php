<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblhub_resource".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Tblhub[] $tblhubs
 */
class TblhubResource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblhub_resource';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 45],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblhubs()
    {
        return $this->hasMany(Tblhub::className(), ['resource_id' => 'id']);
    }
}
