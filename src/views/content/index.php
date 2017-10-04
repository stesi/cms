<?php

use kartik\grid\GridView;
use yii\helpers\Url;

$this->title = Yii::t('cms/content/labels', 'Contents');

$this->params['buttons'] = [
    ['label' => Yii::t('cms/content/buttons', 'content_buttons.index.create_content'),
        'url' => ['content/create'],
        'linkOptions' => ["class" => "showModalButton btn btn-sm btn-default",
            "title" => Yii::t('cms/content/titles', 'content_buttons_titles.index.create_content'),
            'data' => ['modal-unique' => 'content-create'],],],
];

?>
<div class="content-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php $columns = [
        //['class' => 'kartik\grid\SerialColumn'],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detailUrl' => Url::to(['content/detail']),
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true
        ],
        'id',
        'content_type_id',
        'title',
        //'body:ntext',
        'icon',
        'tip',
        'created_at',
        'updated_at',
        'created_by',
        // 'updated_by',
        'start_date',
        'end_date',
        ['class' => 'kartik\grid\ActionColumn'],
    ];

    require(Yii::getAlias('@app/views/layouts/grid_layout.php'));
    ?>
</div>
