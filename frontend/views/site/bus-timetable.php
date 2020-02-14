<?php

use kartik\grid\GridView;
use kartik\widgets\Select2;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;

$this->title = 'РАСПИСАНИЕ ДВИЖЕНИЯ АВТОБУСОВ';

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Расписание движения автобусов на автовокзале города Луганск.
Номер телефона для покупки и бронирования билетов, отправка с официального автовокзала Луганска ЛНР.',
], 'description');


$this->registerCssFile('/css/lightbox.min.css');
$this->registerJsFile('/js/lightbox-plus-jquery.min.js');
?>
<div class="autodor-container">
    <div class="page-title">
        <div class="line"></div><?=$this->title?><div class="line"></div>
    </div>
    <div class="container">

        <?php $form = ActiveForm::begin([
            'action' => ['bus-timetable'],
            'method' => 'get',
        ]); ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($searchModel, 'search')->widget(Select2::class,[
                    'data' => $stationList,
                    'language' => 'ru',
                    'options' => [
                        'placeholder' => '',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ])->label(false) ?>
            </div>
            <div class="col-md-4">
                <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

        <div class="row text-center">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],
                    [
                        'attribute' => 'otpr',
                        'format' => 'time',
                        'label' => 'Отправ- ление',
                        'contentOptions' => ['class' => 'kv-align-middle'],
                        'headerOptions' => ['style' => 'padding: 5px;']
                    ],
                    [
                        'attribute' => 'prib',
                        'format' => 'time',
                        'label' => 'При- бытие',
                        'contentOptions' => ['class' => 'kv-align-middle'],
                        'headerOptions' => ['style' => 'padding: 5px;']
                    ],
                    [
                        'attribute' => 'flight',
                        'contentOptions' => ['class' => 'kv-align-middle'],
                        'headerOptions' => ['style' => 'padding: 5px;']
                    ],
                    [
                        'attribute' => 'route',
                        'format' => 'ntext',
                        'contentOptions' => ['class' => 'kv-align-middle'],
                        'headerOptions' => ['style' => 'padding: 5px;']
                    ],
                    [
                        'attribute' => 'car_model',
                        'value' => function($data) {
                            return !empty($data->file_bus) ? Html::a($data->car_model, $data->file_bus, ['class' => 'example-image-link', 'data-lightbox' => $data->flight]) : $data->car_model;
                        },
                        'format' => 'raw',
                        'contentOptions' => ['class' => 'kv-align-middle', 'style' => 'white-space: normal'],
                        'headerOptions' => ['style' => 'padding: 5px;']
                    ],
                    [
                        'attribute' => 'periodicity',
                        'format' => 'ntext',
                        'contentOptions' => ['class' => 'kv-align-middle', 'style' => 'white-space: normal'],
                        'headerOptions' => ['style' => 'padding: 5px;']
                    ],
                    [
                        'attribute' => 'url_pdf',
                        'format' => 'raw',
                        'value' => 'pdfView',
                        'contentOptions' => ['class' => 'kv-align-middle', 'style' => 'white-space: normal'],
                        'headerOptions' => ['style' => 'padding:5px']
                    ],
                ],
                'layout' => "{summary}\n{items}\n<div class='d-flex justify-content-center'>{pager}</div>",
            ]); ?>
        </div>
        <small class="text-center d-block">*Марка автобуса может отличаться от заявленной и представленной на изображении</small>
    </div>
</div>