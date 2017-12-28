<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblhub_phase".
 *
 * @property integer $id
 * @property string $phase
 * @property string $status
 *
 * @property TblhubCategory[] $tblhubCategories
 */
class TblhubPhase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblhub_phase';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phase'], 'required'],
            [['phase', 'status'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phase' => 'Phase',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblhubCategories()
    {
        return $this->hasMany(TblhubCategory::className(), ['id_phase' => 'id']);
    }
}
