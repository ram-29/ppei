<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblattribute".
 *
 * @property integer $id
 * @property string $attribute
 * @property string $data_type
 */
class Tblattribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblattribute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attribute', 'data_type'], 'required'],
            [['attribute', 'data_type'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'attribute' => 'Attribute',
            'data_type' => 'Data Type',
        ];
    }

    /**
     * @inheritdoc
     * @return TblattributeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblattributeQuery(get_called_class());
    }
}
