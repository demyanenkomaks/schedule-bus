<?php

use yii\bootstrap4\LinkPager;
use yii\helpers\Html;

$this->title = 'Новости';

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Новости официального Луганского автовокзала.
Автовокзал Луганск - изменение внесенное в расписание движения автобусов в Москву, Санкт-Петербург, Белгород, Ростов-на-Дону, Симферополь.',
], 'description');
?>
<div class="autodor-container news">
    <div class="page-title">
        <div class="line"></div><?= Html::encode($this->title) ?><div class="line"></div>
    </div>
    <div class="container">
        <div class="info">

            <h5 class="text text-center">К сведению пассажиров и перевозчиков!</h5>
            <p>
                В соответствии с приказом Министерства инфраструктуры и транспорта Луганской Народной Республики от 27.03.2019 № 113 «Об установлении мест отправления транспортных средств, осуществляющих нерегулярные (по заказу) перевозки пассажиров (кроме ритуальных, свадебных и праздничных)», зарегистрированным в Министерстве юстиции Луганской Народной Республики 02.04.2019 за № 170/2719, начиная с 13.04.2019 г. изменяется место отправления транспортных средств, осуществляющих нерегулярные перевозки (по заказу) пассажиров.
                Уведомляем, что отправления автобусов, осуществляющих все виды пассажирских перевозок, должны осуществляться только в установленном законодательством порядке - с территории аттестованных автостанций Луганской Народной Республики.
            </p>


        </div>
        <div class="row justify-content-center">
            <?php foreach ($models as $model) : ?>
                <?= $this->render('_post', ['model' => $model]) ?>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <?= LinkPager::widget([
                'pagination' => $pages,
            ]); ?>
        </div>
    </div>
</div>