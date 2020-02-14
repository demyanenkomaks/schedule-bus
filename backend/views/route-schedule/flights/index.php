<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FlightsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

    <p class="pad-top-15">
        <?= Html::a('Редактировать', ['update-flights', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            [
                'attribute' => 'id_station',
                'value' => 'stationName',
                'contentOptions' => ['class' => 'normal']
            ],

//            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

