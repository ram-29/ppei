<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblgroup".
 *
 * @property integer $id
 * @property integer $feature_id
 *
 * @property Tblcontent[] $tblcontents
 * @property Tblfeature $feature
 */
class Tblgroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblgroup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['feature_id'], 'required'],
            [['feature_id'], 'integer'],
            [['feature_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tblfeature::className(), 'targetAttribute' => ['feature_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'feature_id' => 'Feature ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblcontents()
    {
        return $this->hasMany(Tblcontent::className(), ['group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeature()
    {
        return $this->hasOne(Tblfeature::className(), ['id' => 'feature_id']);
    }

    /**
     * @inheritdoc
     * @return TblgroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblgroupQuery(get_called_class());
    }
}
