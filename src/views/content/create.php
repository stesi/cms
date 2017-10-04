<?php

use yii\helpers\Html;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $model stesi\cms\models\Content */

$this->title = Yii::t('cms/content/labels', 'title.create_content');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms/content/labels', 'breadcrumbs.contents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-create">

    <?php Pjax::begin(); ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <?php Pjax::end(); ?>
</div>
