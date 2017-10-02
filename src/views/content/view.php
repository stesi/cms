<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model stesi\cms\models\Content */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('gles/content/labels', 'Contents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['buttons'] = [
    ['label' => 'Update', 'url' => ['update', "id" => $model->id], 'linkOptions' => ["class" => "showModalButton btn btn-sm btn-primary", "title" => 'Update']],
    ['label' => 'Delete', 'url' => ['delete', "id" => $model->id], 'linkOptions' => ["class" => "btn btn-sm btn btn-danger", "title" => 'Delete',
        'data' => [
            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
            'method' => 'post',
        ]]]
];

?>
<div class="content-view col-md-12">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'content_type_id',
            'title',
            'body:ntext',
            'icon',
            'tip',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'start_date',
            'end_date',
            'content_before:ntext',
            'content_after:ntext',
            'is_block_page',
        ],
    ]) ?>

</div>
