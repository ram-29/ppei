<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Tblcontent]].
 *
 * @see Tblcontent
 */
class TblcontentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tblcontent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tblcontent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
