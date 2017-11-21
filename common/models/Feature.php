<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tblfeature".
 *
 * @property integer $id
 * @property string $name
 * @property string $attributes
 * @property integer $isVisible
 *
 * @property Tblcontent[] $tblcontents
 */
class Feature extends \yii\db\ActiveRecord
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
            [['name', 'attributes', 'isVisible'], 'required'],
            [['attributes'], 'string'],
            [['isVisible'], 'integer'],
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
            'attributes' => 'Attributes',
            'isVisible' => 'Is Visible',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblcontents()
    {
        return $this->hasMany(Tblcontent::className(), ['feature_id' => 'id']);
    }
}
