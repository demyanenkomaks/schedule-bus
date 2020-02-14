<?php

use kartik\date\DatePicker;
use kartik\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;

$layout_dp ='{input1}
             <span class="input-group-addon">-</span>
             {input2}
             <span class="input-group-addon kv-date-remove">
              <i class="glyphicon glyphicon-remove"></i>
             </span>';
?>
<div class="news-index">

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
                'format' => 'ntext',
                'contentOptions' => ['class' => 'normal']
            ],
            [
                'attribute' => 'date_placement',
                'format' => 'datetime',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'layout' => $layout_dp,
                    'attribute' => 'date_placement[1]',
                    'attribute2' => 'date_placement[2]',
                    'name'=>'date_placement[1]',
                    'value' => 'date_placement[1]',
                    'separator' => 'по',
                    'value2' => 'date_placement[2]',
                    'name2'=>'date_placement[2]',
                    'type' => DatePicker::TYPE_RANGE,
                    'pluginOptions' => ['autoclose'=>true,'format' => 'dd.mm.yyyy']
                ]),
            ],

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>


</div>
