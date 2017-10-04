<?php

namespace stesi\cms\models;

/**
 * This is the ActiveQuery class for [[ContentRelationManager]].
 *
 * @see ContentRelationManager
 */
class ContentRelationManagerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ContentRelationManager[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ContentRelationManager|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }



}