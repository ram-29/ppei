<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblhub".
 *
 * @property integer $id
 * @property string $file_name
 * @property integer $hcategory_id
 * @property integer $resource_id
 * @property string $status
 *
 * @property TblhubCategory $hcategory
 * @property TblhubResource $resource
 */
class Tblhub extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $fileNames;
    public $file;

    public static function tableName()
    {
        return 'tblhub';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phase_id', 'hcategory_id', 'resource_id', 'status'], 'required'],
            [['phase_id','hcategory_id', 'resource_id'], 'integer'],
            [['file_name'], 'string', 'max' => 100],
            [['fileNames'], 'file', 'extensions' => 'pdf', 'maxFiles' => 5],
            [['file'], 'file', 'extensions' => 'pdf'],
            [['status'], 'string', 'max' => 20],
            [['hcategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblhubCategory::className(), 'targetAttribute' => ['hcategory_id' => 'id']],
            [['resource_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblhubResource::className(), 'targetAttribute' => ['resource_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file_name' => 'File',
            'phase_id' => 'Program Phase',
            'hcategory_id' => 'Hub Category',
            'resource_id' => 'Resource Type',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasOne(TblhubCategory::className(), ['id' => 'hcategory_id']);
    }

    public function getPhases()
    {
        return $this->hasOne(TblhubPhase::className(), ['id' => 'phase_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResources()
    {
        return $this->hasOne(TblhubResource::className(), ['id' => 'resource_id']);
    }
}
