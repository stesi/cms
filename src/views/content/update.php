<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model stesi\cms\models\Content */

$this->title = Yii::t('gles/content/labels', 'Update {modelClass}: ', [
    'modelClass' => 'Content',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/breadcrumbs', 'content_update_breadcrumbs.Index'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/breadcrumbs', 'update_breadcrumbs.Id').$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app/breadcrumbs', 'update_breadcrumbs.Update');
?>
<div class="content-update">

    <?php Pjax::begin(); ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <?php Pjax::end(); ?>
</div>
