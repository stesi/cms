<?php

use app\widgets\CreatableSelect2;
use kartik\widgets\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\form\ActiveField;
use kartik\form\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model stesi\modules\cms\models\Content */
/* @var $form yii\widgets\ActiveForm
 * @var $contentType stesi\modules\cms\models\ContentType
 */
?>
<?php Pjax::begin();?>
<div class="content-form">
    <?php //echo $this->render("@app/views/layouts/flash-error"); ?>

    <?php $form = ActiveForm::begin([
        'options' => ['data-pjax' => true ],
        'id' => 'content-form',
        'fieldConfig'=>[
            'hintType' => ActiveField::HINT_SPECIAL,
            'hintSettings' => ['container' => '#content-form']
        ],
        ]);
        //'enableAjaxValidation' => true

        echo FormGrid::widget(
            [
                'model' => $model,
                'form' => $form,
                'autoGenerateColumns' => true,
                'rows' => [
                    [
                        'attributes' => [
                            'title' => [
                                'type' => Form::INPUT_TEXT,
                            ],
                            'content_type_id' => [
                                'type' => Form::INPUT_WIDGET,
                                'widgetClass' => CreatableSelect2::class,
                                'fieldConfig' => [
                                    'hintType' => ActiveField::HINT_SPECIAL,
                                    'hintSettings' => ['container' => '#content-form'],
                                ],
                                'options' => [
                                    'pluginOptions' => [
                                        'placeholder' => Yii::t('cms/content/labels', 'content_labels.form.select_content_type'),
                                        'minimumInputLength' => '1',
                                        'ajax' => ArrayHelper::merge(require(Yii::getAlias('@app/config/modules/select2Ajax.php')), [
                                            'url' => Url::to(['content/content-type-list']),
                                        ]),
                                        'allowClear' => true,

                                    ],
                                    'options' => [
                                        'class' => 'js-dependent-input-select2-default', // default trigger action, remove for custom
                                    ],

                                    'initValueText' => ArrayHelper::getValue($model, 'content_type_id'),
                                ],
                            ],
                        ],
                    ],
                    [
                        'attributes' => [
                            'summary' => [
                                'type' => Form::INPUT_TEXT,
                            ],
                        ]

                    ],
                ]
    ]); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('gles/content/labels', 'Create') : Yii::t('gles/content/labels', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php Pjax::end();?>

