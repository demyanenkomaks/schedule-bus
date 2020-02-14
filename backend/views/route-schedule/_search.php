<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RouteScheduleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="route-schedule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'otpr') ?>

    <?= $form->field($model, 'prib') ?>

    <?= $form->field($model, 'flight') ?>

    <?= $form->field($model, 'route') ?>

    <?php // echo $form->field($model, 'car_model') ?>

    <?php // echo $form->field($model, 'capacity') ?>

    <?php // echo $form->field($model, 'periodicity') ?>

    <?php // echo $form->field($model, 'carrier') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
