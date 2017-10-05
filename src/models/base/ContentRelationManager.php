<?php

namespace stesi\cms\models\base;

use stesi\core\models\base\StesiModel;
use Yii;

/**
 * This is the base model class for table "content_relation_manager".
 *
 * @property integer $id
 * @property integer $content_parent_id
 * @property integer $content_child_id
 * @property integer $position
 *
 * @property \stesi\cms\models\Content $contentParent
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
            [['content_parent_id', 'content_child_id', 'position'], 'integer'],
            [['content_parent_id', 'content_child_id'], 'unique', 'targetAttribute' => ['content_parent_id', 'content_child_id'], 'message' => 'The combination of Content Parent ID and Content Child ID has already been taken.'],
            [['content_parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => \stesi\cms\models\Content::className(), 'targetAttribute' => ['content_parent_id' => 'id']],
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
    public function getContentParent()
    {
        return $this->hasOne(\stesi\cms\models\Content::className(), ['id' => 'content_parent_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContentChild()
    {
        return $this->hasOne(\stesi\cms\models\Content::className(), ['id' => 'content_child_id']);
    }

    /**
     * @inheritdoc
     * @return \stesi\cms\models\ContentRelationManagerQuery
     */
    public static function find()
    {
        return new \stesi\cms\models\ContentRelationManagerQuery(get_called_class());
    }


}

