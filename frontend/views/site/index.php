<?php

/* @var $this yii\web\View */

$this->title = 'Официальный сайт автовокзала в городе Луганск.';

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Автовокзал в городе Луганск - расписание движения автобусов в Москву, Воронеж, Ростов-на-Дону, Ялту, Сочи.',
], 'description');
?>

<div class="autodor-page">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="slider">
                <?= $this->render('_slider') ?>
            </div>
        </div>
        <div class="col-12 name-enterprise">
            <div class="container">
                <h4 class="name">
                    ОП «Республиканский
                    центр организации перевозок» <br> ГУП ЛНР
                    «Луганский автодор»
                </h4>
            </div>
        </div>
        <div class="col-12">
            <div class="about-enterprise">
                <?= $this->render('_about-enterprise') ?>
            </div>
        </div>
    </div>
</div>