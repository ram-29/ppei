<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbltype".
 *
 * @property integer $id
 * @property string $type
 *
 * @property Tblattribute[] $tblattributes
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbltype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblattributes()
    {
        return $this->hasMany(Tblattribute::className(), ['type_id' => 'id']);
    }
}
