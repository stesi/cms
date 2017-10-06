<?php

use app\widgets\CreatableSelect2;
use kartik\daterange\DateRangePicker;
use kartik\widgets\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\form\ActiveField;
use kartik\form\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Url;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model stesi\cms\models\Content */
/* @var $form yii\widgets\ActiveForm
 * @var $contentType stesi\cms\models\ContentType
 */
?>

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
                            'icon' => [
                                'type' => Form::INPUT_WIDGET,
                                'widgetClass' => '\insolita\iconpicker\Iconpicker',
                                'iconset'=>'fontawesome',
                                'clientOptions'=>['rows'=>8,'cols'=>10,'placement'=>'right'],
                            ],
                        ]

                    ],
                ]
    ]); ?>

    <?php //echo $form->field($model,"body")->textarea(); ?>

    <?php echo $form->field($model, 'body')->widget(\dosamigos\ckeditor\CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]); ?>


    <?php echo $form->field($model,"tip")->textInput(); ?>

    <div class="form-group">
        <label class="control-label"><?= $model->getAttributeLabel(Yii::t('cms/content/labels', 'content_labels.form.start_end_range')) ?></label>
        <div class="input-group drp-container">
            <?= DateRangePicker::widget([
                'model' => $model,
                'attribute' => 'start_end_range',
                'useWithAddon' => true,
                'convertFormat' => true,
                'pluginOptions' => [
                    'locale' => [
                        'separator' => Yii::t('format', 'separator'),
                        'format' => Yii::t('format', 'date'),
                    ],
                ]
            ]); ?>
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </div>
    </div>

    <?php $subFormsItems = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('cms/content/labels', 'content_tabs.content_relation_manager')),
            'content' => $this->render('_form_content_relation_manager', [
                'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $model->contentRelationManagerChildrens]),
                'form' => $form
            ])
        ]
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $subFormsItems,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>

    <div class="form-group">
        <div class="row">
            <div class="col-sm-1">
                <?= Html::resetButton(Yii::t('app/buttons', 'form_button_reset'), ['class' => 'btn btn-default']) ?>
            </div>
            <div class="col-sm-11 text-right">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app/buttons', 'form_button_create') : Yii::t('app/buttons', 'form_button_update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-info']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>


