<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Flights */

$this->title = 'Редактирование маршрута: ' . $model->flight;
$this->params['breadcrumbs'][] = ['label' => 'Расписание маршрутов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->flight, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flights-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['id' => 'flights-id']); ?>

    <?= $this->render('_form', ['models_flights' => $models_flights, 'form' => $form, 'stationList' => $stationList]) ?>

    <div class="form-group col-md-6 pad-top-15">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
