<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblfeature".
 *
 * @property integer $id
 * @property string $feature
 * @property string $attributes
 * @property integer $isVisible
 */
class Tblfeature extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblfeature';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['feature'], 'required'],
            [['attributes'], 'string'],
            [['isVisible'], 'integer'],
            [['feature'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'feature' => 'Feature',
            'attributes' => 'Attributes',
            'isVisible' => 'Visible to Frontend',
        ];
    }

    /**
     * @inheritdoc
     * @return TblfeatureQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblfeatureQuery(get_called_class());
    }

    // public function attributes()
    // {
    //     return $this->hasMany(Tblattributes::className(), ['attribute_id' => 'id']);
    // }
}
