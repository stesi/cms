<?php
use stesi\cms\models\ContentRelationManager;
use stesi\core\widgets\CreatableSelect2;
use kartik\builder\TabularForm;
use kartik\daterange\DateRangePicker;
use kartik\form\ActiveForm;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use stesi\cms\models\ContentRelationManagerChildren;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\BaseDataProvider */
/* @var $form yii\widgets\ActiveForm */


$subformName = 'content_relation_manager';
$subformId = 'tabular-form-content-relation-manager-wrapper';
$modelName=ContentRelationManagerChildren::class;
$buttonAddMessage= Yii::t('cms/content/buttons', 'content_buttons.form_content_relation_manager.add_content_relation_manager');
$parentFormId='content-form';

if (!isset($form)) {
    $form = ActiveForm::begin();
    ActiveForm::end();
}

$formAttributes = [
    'id' => [
        'type' => TabularForm::INPUT_HIDDEN,
        'columnOptions' => ['hidden' => true],
    ],
    'content_child_id' => [
        'type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => CreatableSelect2::class,
        'options' => function ($model, $key, $index, $widget) {
            $inputId = 'contentrelationmanager-content_child_id-' . $key;
            return [
                'initValueText' => ArrayHelper::getValue($model, 'contentChild.idWithInfo'),
                'pluginOptions' => [
                    'placeholder' => Yii::t('cms/content/labels', 'content_relation_manager_labels.form.select_a_child'),
                    'minimumInputLength' => '1',
                    'ajax' => ArrayHelper::merge(require(Yii::getAlias('@app/config/modules/select2Ajax.php')), [
                        'url' => Url::to(['content/content-title-list']),
                    ]),
                ],
                'options' => [
                    'class' => 'js-dependent-input-select2-default', // default trigger action, remove for custom
                ],
            ];
        },
    ],
    'position'=>['type'=>TabularForm::INPUT_TEXT,
        'columnOptions'=>[
            'width'=>'100px'
        ]
    ],
    'del' => [
        'type' => 'raw',
        'label' => '',
        'value' => function ($model, $key) {
            return
                Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' => Yii::t('app', 'Delete'), 'class' => 'btn_del_form_row']);
        },
    ],
];

?>

<div id="<?=$subformId?>">
    <?= TabularForm::widget([
        'dataProvider' => $dataProvider,
        'form' => $form,
        'attributes' => $formAttributes,
        'checkboxColumn' => false,
        'actionColumn' => false,
        'gridSettings' => require(__DIR__ . '/../../../../../config/modules/gridSettingsOfTabularInput.php')
    ]); ?>
</div>

<?php  require(__DIR__ . '/../../../../../views/layouts/appendClientValidationSubForm.php');


?>
