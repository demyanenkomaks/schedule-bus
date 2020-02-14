<?php

use yii\helpers\Html;
use phpnt\yandexMap\YandexMaps;

/* @var $this yii\web\View */
/* @var $model backend\models\ContactsStation */

$this->title = 'Просмотр автостанции: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Контакты автостанций', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="contacts-station-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить данную запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <?= YandexMaps::widget([
    'myPlacemarks' => $model->getYandexItem(),
    'mapOptions' => [
        'center' => [$model->latitude, $model->longitude], // центр карты
        'zoom' => 16,// показывать в масштабе
        'controls' => ['zoomControl'],  // использовать эл. управления
        'control' => [
        ],
    ],
    'disableScroll' => true, // отключить скролл колесиком мыши (по умолчанию true)
    'windowWidth' => '100%', // длинна карты (по умолчанию 100%)
    'windowHeight' => '400px', // высота карты (по умолчанию 400px)
    ]);
    ?>

</div>
