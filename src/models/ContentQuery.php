<?php

namespace app\stesi\cms\src\models;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Content]].
 *
 * @see Content
 */
class ContentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Content[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Content|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * Restituisce la lista di tutti i content del parametro passato
     * @return ActiveQuery
     */
    public function getContent($content_type_id){
        return $this->andWhere(["content_type_id"=>$content_type_id]);
    }

    /**
     * Restituisce la lista dei content contenuti in un dato content padre, bisogna definire anche il numero degli elementi
     * che saranno restituiti
     * @return ActiveQuery
     */
    public function getContentChild($content_type_id, $content_parent_id, $limit){

        return $this->getContent($content_type_id)
            ->innerJoin("content_relation_manager", "content.id = content_relation_manager.content_child_id")
            ->andWhere(["content_relation_manager.content_parent_id"=>$content_parent_id])
            ->orderBy('position')
            ->limit($limit);
    }
}