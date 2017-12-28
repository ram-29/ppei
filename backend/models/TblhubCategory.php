<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblhub_category".
 *
 * @property integer $id
 * @property string $category
 * @property integer $id_phase
 *
 * @property Tblhub[] $tblhubs
 * @property TblhubPhase $idPhase
 */
class TblhubCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblhub_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'id_phase'], 'required'],
            [['id_phase'], 'integer'],
            [['category'], 'string', 'max' => 45],
            [['id_phase'], 'exist', 'skipOnError' => true, 'targetClass' => TblhubPhase::className(), 'targetAttribute' => ['id_phase' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'id_phase' => 'Program Phase',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblhubs()
    {
        return $this->hasMany(Tblhub::className(), ['hcategory_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhases()
    {
        return $this->hasOne(TblhubPhase::className(), ['id' => 'id_phase']);
    }
}
