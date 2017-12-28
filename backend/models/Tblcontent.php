<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblcontent".
 *
 * @property integer $id
 * @property integer $feature_id
 * @property integer $group_id
 * @property string $attribute
 * @property string $value
 *
 * @property Tblgroup $group
 * @property Tblfeature $feature
 */
class Tblcontent extends \yii\db\ActiveRecord
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

    // public $rules;
    // public $attri = [];


    public $images, $files, $title, $contents, $date, $user, $content;

    public function rules()
    {
        //$feature_id = getFeatures()->feature_id;
        // $featureAttributes = Tblfeature::find()->where(['id' => '36'])->one();
        // $att = unserialize($featureAttributes->attributes);

        // foreach ($att as $key => $value)
        // {
        //     $attri[] = [$key];
        // }

        return [
            [['feature_id', 'group_id', 'attribute', 'value'], 'required'],
            [['feature_id', 'group_id'], 'integer'],
            [['value'], 'string'],
            [['attribute'], 'string', 'max' => 200],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tblgroup::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['feature_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tblfeature::className(), 'targetAttribute' => ['feature_id' => 'id']],

            //[[$attri], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'feature_id' => 'Feature',
            'group_id' => 'Group',
            'attribute' => 'Attribute',
            'value' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Tblgroup::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeatures()
    {
        return $this->hasOne(Tblfeature::className(), ['id' => 'feature_id']);
    }

    function GetTruncatedValue()
    {
        if (strlen($this->value) <= 50)
            return $this->value;
        else
            return substr($this->value, 0, 60) . '...';
    }

    /**
     * @inheritdoc
     * @return TblcontentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblcontentQuery(get_called_class());
    }

    // public function getMergeRows()
    // {
        
    //     if($this->group_id != $prev){
    //         return $this->group_id;
    //         $prev = $this->group_id;
    //       }
    // }
}
