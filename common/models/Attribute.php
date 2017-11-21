<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tblattribute".
 *
 * @property integer $id
 * @property string $name
 * @property integer $type_id
 *
 * @property Tbltype $type
 */
class Attribute extends \yii\db\ActiveRecord
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
            [['name', 'type_id'], 'required'],
            [['type_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tbltype::className(), 'targetAttribute' => ['type_id' => 'id']],
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
            'type_id' => 'Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Tbltype::className(), ['id' => 'type_id']);
    }
}
