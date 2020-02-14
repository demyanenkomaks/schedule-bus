<?php

use kartik\widgets\TimePicker;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RouteScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Расписание маршрутов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="route-schedule-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            [
                'attribute' => 'otpr',
                'format' => 'time',
                'filter' => false,
            ],
            [
                'attribute' => 'prib',
                'format' => 'time',
                'filter' => false,
            ],
            'flight',
            [
                'attribute' => 'route',
                'format' => 'ntext',
                'contentOptions' => ['class' => 'normal']
            ],
            [
                'attribute' => 'car_model',
                'format' => 'ntext',
                'contentOptions' => ['class' => 'normal']
            ],
            [
                'attribute' => 'periodicity',
                'format' => 'ntext',
                'contentOptions' => ['class' => 'normal']
            ],
            [
                'attribute' => 'url_pdf',
                'format' => 'raw',
                'value' => 'pdfView',
                'contentOptions' => ['class' => 'normal']
            ],
            [
                'attribute' => 'file_bus',
                'format' => 'raw',
                'value' => 'busView',
                'contentOptions' => ['class' => 'normal']
            ],

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>


</div>
