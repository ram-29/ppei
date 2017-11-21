<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tblcontent".
 *
 * @property integer $id
 * @property integer $feature_id
 * @property string $content
 *
 * @property Tblfeature $feature
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblcontent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['feature_id', 'content'], 'required'],
            [['feature_id'], 'integer'],
            [['content'], 'string'],
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
            'content' => 'Content',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeature()
    {
        return $this->hasOne(Tblfeature::className(), ['id' => 'feature_id']);
    }
}
