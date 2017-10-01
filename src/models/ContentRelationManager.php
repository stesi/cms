<?php

namespace stesi\modules\cms\models;

use Yii;
use \stesi\modules\cms\models\base\ContentRelationManager as BaseContentRelationManager;

/**
 * This is the model class for table "content_relation_manager".
 */
class ContentRelationManager extends BaseContentRelationManager
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return parent::rules();
        //return array_merge(parent::rules(), []);
        //return array_replace_recursive(parent::rules(),[]);

    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
        'id' => Yii::t('cms/contet_relation_manager/labels', 'content_relation_manager_labels.id'),
        'contente_parent_id' => Yii::t('cms/contet_relation_manager/labels', 'content_relation_manager_labels.contente_parent_id'),
        'content_child_id' => Yii::t('cms/contet_relation_manager/labels', 'content_relation_manager_labels.content_child_id'),
        'position' => Yii::t('cms/contet_relation_manager/labels', 'content_relation_manager_labels.position'),
        ];
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('cms/contet_relation_manager/hints', 'content_relation_manager_hints.id'),
            'contente_parent_id' => Yii::t('cms/contet_relation_manager/hints', 'content_relation_manager_hints.contente_parent_id'),
            'content_child_id' => Yii::t('cms/contet_relation_manager/hints', 'content_relation_manager_hints.content_child_id'),
            'position' => Yii::t('cms/contet_relation_manager/hints', 'content_relation_manager_hints.position'),
        ];
    }
}
