<?php

use phpnt\yandexMap\YandexMaps;
use yii\helpers\Html;

$this->title = 'Контакты';

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'График работы Луганского автовокзала.
Продаем билеты на автобус Луганск -Москва, Сочи, Ялта, Волгоград, Белгород, Санкт-Петербург.',
], 'description');
?>

<div class="autodor-container">
    <div class="page-title">
        <div class="line"></div>АВТОСТАНЦИИ<div class="line"></div>
    </div>
    <div class="container as">
        <div class="row justify-content-center">
            <?php foreach ($models as $model) : ?>
                <div class="col-4 p-3 as-item">
                    <h5 calss="as-title"><b><?= $model->title ?></b></h5>
                    <span class="as-info">Адрес: <b><?= $model->address ?></b></span></br>
                    <span class="as-info">Режим работы: <b><?= $model->working ?></b></span></br>
                    <span class="as-info">Контакты: <b><?= $model->contacts ?></b></span></br>
                    <button class="btn btn-primary" onclick="showMap(<?= $model->id ?>)">Посмотреть на карте</button>
                </div>
            <?php endforeach ?>
        </div>

    </div>
</div>
<?php
$this->registerJsFile('https://api-maps.yandex.ru/2.1/?lang=ru_RU', ['position' => yii\web\View::POS_END]);
?>
<?= $this->render('/site/_modal') ?>
<script>
    function showMap(asID) {
        $.ajax({
            type: "GET",
            url: "/site/get-ajax-map?asID=" + asID,
        }).then(function(map) {
            $('#main-modal .modal-body').html(map);
            $('#main-modal').modal('show');
        });
    }
</script>