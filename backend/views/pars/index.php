<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Парсинг';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sp-gabarit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <div class="col-xs-12">
        <div class="col-xs-6"><?= $form->field($model_file, 'file')->fileInput() ?></div>
        <div class="pull-right" style="padding-top: 15px;"><button class="btn btn-success">Отправить</button></div>
    </div>
    <?php ActiveForm::end() ?>

</div>