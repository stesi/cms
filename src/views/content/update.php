<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model stesi\cms\models\Content */

$this->title = Yii::t('gles/content/labels', 'Update {modelClass}: ', [
    'modelClass' => 'Content',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('gles/content/labels', 'Contents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('gles/content/labels', 'Update');
?>
<div class="content-update">

    <?php Pjax::begin(); ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <?php Pjax::end(); ?>
</div>
