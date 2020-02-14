<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RouteSchedule */

$this->title = 'Редактирование маршрута: ' . $model->flight;
$this->params['breadcrumbs'][] = ['label' => 'Расписание маршрутов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->flight, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="route-schedule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
