<?php

namespace stesi\cms\models\base;

use app\models\base\StesiModel;
use Yii;

/**
 * This is the base model class for table "content_type".
 *
 * @property string $id
 * @property string $description
 */
class ContentType extends StesiModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['description'], 'string'],
            [['id'], 'string', 'max' => 64],
            [['id'], 'default']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content_type';
    }

}

