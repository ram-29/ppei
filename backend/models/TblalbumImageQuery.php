<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[TblalbumImage]].
 *
 * @see TblalbumImage
 */
class TblalbumImageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TblalbumImage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TblalbumImage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
