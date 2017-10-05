<?php

namespace stesi\cms\models\base;

use stesi\core\models\base\StesiModel;
use Yii;

/**
 * This is the base model class for table "content_relation_manager".
 *
 * @property integer $id
 * @property integer $contente_parent_id
 * @property integer $content_child_id
 * @property integer $position
 *
 * @property \stesi\cms\models\Content $contenteParent
 * @property \stesi\cms\models\Content $contentChild
 */
class ContentRelationManager extends StesiModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contente_parent_id', 'content_child_id', 'position'], 'integer'],
            [['contente_parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => \stesi\cms\models\Content::className(), 'targetAttribute' => ['contente_parent_id' => 'id']],
            [['content_child_id'], 'exist', 'skipOnError' => true, 'targetClass' => \stesi\cms\models\Content::className(), 'targetAttribute' => ['content_child_id' => 'id']]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content_relation_manager';
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContenteParent()
    {
        return $this->hasOne(\stesi\cms\models\Content::className(), ['id' => 'contente_parent_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContentChild()
    {
        return $this->hasOne(\stesi\cms\models\Content::className(), ['id' => 'content_child_id']);
    }
    
}

