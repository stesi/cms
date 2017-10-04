<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model stesi\cms\models\Content */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms/content/labels', 'Contents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['buttons'] = [
    ['label' => Yii::t('app/buttons', 'view_button_update'), 'url' => ['update', "id" => $model->id], 'linkOptions' => ["class" => "showModalButton btn btn-sm btn-info", "title" =>Yii::t('app/titles', 'view_button_update')]],
    ['label' => Yii::t('app/buttons', 'view_button_delete'), 'url' => ['delete', "id" => $model->id], 'linkOptions' => ["class" => "btn btn-sm btn btn-danger", "title" => Yii::t('app/titles', 'view_button_delete'),
        'data' => [
            'confirm' => Yii::t('app/message', 'Are you sure you want to delete this item?'),
            'method' => 'post',
        ]]]
];

?>
<div class="content-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'content_type_id',
            'title',
            'summary',
            'body:ntext',
            'icon',
            'tip',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'start_date',
            'end_date',
        ],
    ]) ;
    ?>



<?php
    require_once(__DIR__ . "/../../../../../views/layouts/_detail_view.php")
    ?>

</div>