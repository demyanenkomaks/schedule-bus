<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Station */

$this->title = 'Добавление станции';
$this->params['breadcrumbs'][] = ['label' => 'Станции', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="station-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
