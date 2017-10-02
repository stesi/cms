<?php

namespace stesi\cms\models;

use Yii;
use \stesi\cms\models\base\ContentType as BaseContentType;

/**
 * This is the model class for table "content_type".
 */
class ContentType extends BaseContentType
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
        'id' => Yii::t('cms/contet_type/labels', 'content_type_labels.id'),
        'description' => Yii::t('cms/contet_type/labels', 'content_type_labels.description'),
        ];
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('cms/contet_type/hints', 'content_type_hints.id'),
            'description' => Yii::t('cms/contet_type/hints', 'content_type_hints.description'),
        ];
    }
}
