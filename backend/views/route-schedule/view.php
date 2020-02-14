<?php

use yii\helpers\Html;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model backend\models\RouteSchedule */

$this->title = 'Просмотр маршрута: ' . $model->flight;
$this->params['breadcrumbs'][] = ['label' => 'Расписание маршрутов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="route-schedule-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $items = [
        [
            'label' => '<i class="glyphicon glyphicon-list-alt"></i> Данные о маршруте',
            'content' => $this->render('view_route', [
                'model' => $model,
                'title' => $this->title,
            ]),
            'active' => true,

        ],
        [
            'label' => '<i class="glyphicon glyphicon-file"></i> Маршрут',
            'content' => $this->render('flights/index',[
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'title' => $this->title
            ]),
//            'active' => true,
        ],
    ];
    ?>

    <?php

    echo TabsX::widget([
        'items' => $items,
        'position' => TabsX::POS_ABOVE,
        'encodeLabels' => false,
    ]);

    ?>

</div>
