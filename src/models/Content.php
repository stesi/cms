<?php

namespace stesi\cms\models;

use stesi\core\behaviors\DateRangeBehavior;
use stesi\core\behaviors\DateTimeFormatBehavior;
use nhkey\arh\ActiveRecordHistoryBehavior;
use Yii;
use \stesi\cms\models\base\Content as BaseContent;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "content".
 *
 * @property string $end_date
 * @property string $start_date
 *
 * @property \stesi\gles\models\User $createdBy
 * @property \stesi\cms\models\ContentRelationManager[] $contentRelationManagers
 * @property \stesi\cms\models\ContentRelationManagerChildren[] $contentRelationManagerChildrens
 *
 */
class Content extends BaseContent
{

    public $autoRelationMethodNameEnabled = ['getContentRelationManagers', 'getContentRelationManagerChildrens'];

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'date_format' => [
                'class' => DateTimeFormatBehavior::class,
                'attributes' => ['start', 'end'],
            ],
            'date_range' => [
                'class' => DateRangeBehavior::class,
                'attribute' => 'start_end_range',
                'startAttribute' => 'start_date',
                'endAttribute' => 'end_date',
            ],
            ActiveRecordHistoryBehavior::className(), //For log crud operations
        ]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['start_end_range'], 'safe'], // safe because start/end will be validated
        ]);

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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContentRelationManagers()
    {
        return $this->hasMany(ContentRelationManager::className(), ['content_child_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContentRelationManagerChildrens()
    {
        return $this->hasMany(ContentRelationManagerChildren::className(), ['content_parent_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(\stesi\gles\models\User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContentChildrens()
    {
        return $this->hasMany(Content::className(), ['id' => 'content_child_id'])->via("contentRelationManagerChildrens");
    }


    /**
     * @return string Id with info
     */
    public function getIdWithInfo()
    {
        return implode(' - ', [
            ArrayHelper::getValue($this, 'id'),
            ArrayHelper::getValue($this, 'title')
        ]);
    }
}
