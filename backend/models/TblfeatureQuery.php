<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Tblfeature]].
 *
 * @see Tblfeature
 */
class TblfeatureQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tblfeature[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tblfeature|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
