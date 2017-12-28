<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Tblgroup]].
 *
 * @see Tblgroup
 */
class TblgroupQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tblgroup[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tblgroup|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
