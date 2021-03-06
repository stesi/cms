<?php

namespace stesi\cms\controllers;

use stesi\core\actions\AddFormInputAction;
use stesi\core\actions\CreateAction;
use stesi\core\actions\CreateAjaxAction;
use stesi\core\actions\DeleteAction;
use stesi\core\actions\DetailAction;
use stesi\core\actions\IndexAction;
use stesi\core\actions\ListAction;
use stesi\core\actions\ListActionQuery;
use stesi\core\actions\UpdateAction;
use stesi\core\actions\ViewAction;
use stesi\core\controllers\StesiController;
use stesi\cms\models\Content;
use stesi\cms\models\ContentRelationManagerChildren;
use stesi\cms\models\grid\ContentGrid;
use Yii;
use yii\db\Query;

/**
 * ContentController implements the CRUD actions for Content model.
 */
class ContentController extends StesiController 
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'modelClass' => ContentGrid::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Content::className(),
            ],
            'create-ajax' => [
                'class' => CreateAjaxAction::class,
                'modelClass' => Content::class,
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Content::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Content::className(),
                'redirectAfter' => 'content/'
            ],
            'view' => [
                'class' => ViewAction::className(),
                'modelClass' => Content::className(),
                'additionalParams' => [
                    'detailRules' => $this->getDetailRelationsColumnsView()
                ]
            ],
            'detail' => [
                'class' => DetailAction::className(),
                'modelClass' => Content::className(),
                'returnModel' => true,
                'view' => "@stesi/backend/views/layouts/_detail_view",
                'additionalParams' => [
                    'detailRules' => $this->getDetailRelationsColumns()
                ]

            ],
            'add-form-input' => [
                'class' => AddFormInputAction::className(),
            ],
            'content-list' => [
                'class' => ListAction::className(),
                'modelClass' => Content::className(),
                'description_name' => 'code',
            ],
            'content-title-list' => [
                'class' => ListActionQuery::className(),
                'description_name' => 'title',
                'query' => (new Query())->select(['id as id', 'CONCAT(id, " - ", title) as text'])->distinct()
                    ->from('content')
            ],
            'content-type-list' => [
                'class' => ListActionQuery::className(),
                'description_name' => 'id',
                'query' => (new Query())->select(['id as id', 'id as text'])->distinct()
                    ->from('content_type')
            ],
        ];
    }

    public function getDetailRelationsColumns()
    {
        return ['default' => [
            [
                'label' => Yii::t('cms/content/labels', 'content_tabs.content_relation_manager'),
                'name' => 'contentRelationManagerChildrens',
                'controllerClass' => ContentRelationManagerChildren::class,
                'columns' => [
                    'content_child_id',
                    'contentChild.title'
                ]
            ],
        ]];
    }

    public function getDetailRelationsColumnsView()
    {
        return ['default' => [
            [
                'label' => Yii::t('cms/content/labels', 'content_tabs.content_relation_manager'),
                'name' => 'contentRelationManagerChildrens',
                'controllerClass' => ContentRelationManagerChildren::class,
                'columns' => [
                    'content_child_id',
                    'contentChild.title',
                    'contentChild.content_type_id',
                    'position',
                    'contentChild.start_date',
                    'contentChild.end_date',
                ]
            ],
        ]];
    }
}


