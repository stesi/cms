<?php

namespace stesi\cms\models\base;

use stesi\core\models\base\StesiModel;
use app\stesi\cms\src\models\ContentQuery;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "content".
 *
 * @property integer $id
 * @property string $content_type_id
 * @property string $title
 * @property string $summary
 * @property string $body
 * @property string $icon
 * @property string $tip
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $start_date
 * @property string $end_date
 *
 * @property \stesi\cms\models\ContentType $contentType
 */
class Content extends StesiModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['created_at', 'updated_at', 'start_date', 'end_date'], 'safe'],
            [['content_type_id'], 'string', 'max' => 64],
            [['content_type_id'], 'default'],
            [['title', 'icon', 'tip'], 'string', 'max' => 128],
            [['title', 'icon', 'tip'], 'default'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => \app\modules\gles\models\User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => \app\modules\gles\models\User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['summary'], 'string', 'max' => 256],
            [['summary'], 'default'],
            [['content_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => \stesi\cms\models\ContentType::className(), 'targetAttribute' => ['content_type_id' => 'id']],
            [['title','content_type_id', 'start_date', 'end_date'], 'required'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content';
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContentType()
    {
        return $this->hasOne(\stesi\cms\models\ContentType::className(), ['id' => 'content_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(\app\modules\gles\models\User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(\app\modules\gles\models\User::className(), ['id' => 'updated_by']);
    }

    
/**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('current_timestamp'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return ContentQuery
     */
    public static function find()
    {
        return new ContentQuery(get_called_class());
    }

}

