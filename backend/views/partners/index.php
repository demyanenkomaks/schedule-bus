<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PartnersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Партнеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-index">

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

            'title:ntext',
            [
                'attribute' => 'img',
                'format' => 'raw',
                'value' => function($data){
                    return $data->img ? '<img src="/logo_partners/200x_/' . $data->img . '" alt="" style="width:50px">' : null;
                },
                'filter' => false
            ],
            [
                'attribute' => 'url',
                'format' => 'raw',
                'value' => function($data){
                    return $data->url ? Html::a($data->url, $data->url, ['target' => '_blank']) : null;
                }
            ],

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>


</div>
