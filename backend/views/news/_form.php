<?php

use kartik\datetime\DateTimePicker;
use kartik\widgets\FileInput;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\web\JsExpression;
use yii2jodit\JoditWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form ">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'date_placement')->widget(DateTimePicker::class, [
        'language' => 'ru',
        'options' => [
            'placeholder' => '',
            'value' =>(!empty($model->date_placement))?Yii::$app->formatter->asDatetime($model->date_placement,'php:d.m.Y H:i'):'',
        ],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd.mm.yyyy hh:ii',
        ]
    ]); ?>

    <?= $form->field($model, 'img')->widget(FileInput::class,[
        'pluginOptions' => [
            'showPreview' => false,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => false
        ]
    ]) ?>

    <?=$form->field($model, 'abbreviated')->textInput();?>


    <?=$form->field($model, 'text_full')->widget(JoditWidget::class, [
        'settings' => [
            'enableDragAndDropFileToEditor'=>new JsExpression("true"),
        ],
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
