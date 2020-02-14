<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RouteSchedule */

$this->title = 'Добавление маршрута';
$this->params['breadcrumbs'][] = ['label' => 'Расписание маршрутов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="route-schedule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
