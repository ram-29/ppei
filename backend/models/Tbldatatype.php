<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbldatatype".
 *
 * @property integer $id
 * @property string $dataType
 */
class Tbldatatype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbldatatype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dataType'], 'required'],
            [['dataType'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dataType' => 'Data Type',
        ];
    }
}
