<?php

namespace stesi\modules\cms\controllers;

use app\actions\CreateAction;
use app\actions\DeleteAction;
use app\actions\DetailAction;
use app\actions\IndexAction;
use app\actions\ListAction;
use app\actions\ListActionQuery;
use app\actions\UpdateAction;
use app\actions\ViewAction;
use app\controllers\StesiController;
use stesi\modules\cms\models\Content;
use stesi\modules\cms\models\grid\ContentGrid;
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
                'scenario' => 'insert'
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Content::className(),
                'scenario' => 'update'
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Content::className(),
                'redirectAfter' => 'content/'
            ],
            'view' => [
                'class' => ViewAction::className(),
                'modelClass' => Content::className(),
            ],
            'detail' => [
                'class' => DetailAction::className(),
                'modelClass' => Content::className(),
                'returnModel' => true,
                'view' => "@app/views/layouts/_detail_view",
                'additionalParams' => [
                    //'detailRules' => $this->getDetailRelationsColumns()
                ]

            ],
            ' content-list' => [
                'class' => ListAction::className(),
                'modelClass' => Content::className(),
                'description_name' => 'code',
            ],
            'content-type-list' => [
                'class' => ListActionQuery::className(),
                'query' => (new Query())->select(['id as id', 'id as text'])->distinct()
                    ->from('content_type')
            ],
        ];
    }
}
