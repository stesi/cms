<?php

namespace stesi\modules\cms\models;

use Yii;
use \stesi\modules\cms\models\base\Content as BaseContent;

/**
 * This is the model class for table "content".
 */
class Content extends BaseContent
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
        'id' => Yii::t('cms/content/labels', 'content_labels.id'),
        'content_type_id' => Yii::t('cms/content/labels', 'content_labels.content_type_id'),
        'title' => Yii::t('cms/content/labels', 'content_labels.title'),
        'summary' => Yii::t('cms/content/labels', 'content_labels.summary'),
        'body' => Yii::t('cms/content/labels', 'content_labels.body'),
        'icon' => Yii::t('cms/content/labels', 'content_labels.icon'),
        'tip' => Yii::t('cms/content/labels', 'content_labels.tip'),
        'start_date' => Yii::t('cms/content/labels', 'content_labels.start_date'),
        'end_date' => Yii::t('cms/content/labels', 'content_labels.end_date'),
        'content_before' => Yii::t('cms/content/labels', 'content_labels.content_before'),
        'content_after' => Yii::t('cms/content/labels', 'content_labels.content_after'),
        'is_block_page' => Yii::t('cms/content/labels', 'content_labels.is_block_page'),
        ];
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('cms/content/hints', 'content_hints.id'),
            'content_type_id' => Yii::t('cms/content/hints', 'content_hints.content_type_id'),
            'title' => Yii::t('cms/content/hints', 'content_hints.title'),
            'summary' => Yii::t('cms/content/hints', 'content_hints.summary'),
            'body' => Yii::t('cms/content/hints', 'content_hints.body'),
            'icon' => Yii::t('cms/content/hints', 'content_hints.icon'),
            'tip' => Yii::t('cms/content/hints', 'content_hints.tip'),
            'start_date' => Yii::t('cms/content/hints', 'content_hints.start_date'),
            'end_date' => Yii::t('cms/content/hints', 'content_hints.end_date'),
            'content_before' => Yii::t('cms/content/hints', 'content_hints.content_before'),
            'content_after' => Yii::t('cms/content/hints', 'content_hints.content_after'),
            'is_block_page' => Yii::t('cms/content/hints', 'content_hints.is_block_page'),
        ];
    }
}
