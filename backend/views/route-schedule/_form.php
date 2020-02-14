<?php

use kartik\widgets\FileInput;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\TimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\RouteSchedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="route-schedule-form" style="width: 100%">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'otpr')->widget(TimePicker::class, [
                'pluginOptions' => [
                    'showSeconds' => false,
                    'showMeridian' => false,
                    'minuteStep' => 1,
                ]
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'prib')->widget(TimePicker::class, [
                'pluginOptions' => [
                    'showSeconds' => false,
                    'showMeridian' => false,
                    'minuteStep' => 1,
                ]
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'flight')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'car_model')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'capacity')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'carrier')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'periodicity')->textarea(['rows' => 2]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'url_pdf')->widget(FileInput::class,[
                'pluginOptions' => [
                    'showPreview' => false,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false
                ]
            ]) ?>
        </div>
        <div class="col-md-6" style="padding-top: 30px"><?= $model->pdfUpdate?></div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'file_bus')->widget(FileInput::class,[
                'pluginOptions' => [
                    'showPreview' => false,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false
                ]
            ]) ?>
        </div>
        <div class="col-md-6" style="padding-top: 30px"><?= $model->busUpdate?></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
