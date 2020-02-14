<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ContactsStationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Контакты автостанций';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-station-index">

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
                'attribute' => 'title',
                'contentOptions' => ['class' => 'normal']
            ],
            [
                'attribute' => 'address',
                'contentOptions' => ['class' => 'normal']
            ],

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>


</div>
