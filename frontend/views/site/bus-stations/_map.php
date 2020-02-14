<?php
    use phpnt\yandexMap\YandexMaps;
?>
<?= YandexMaps::widget([
    'myPlacemarks' => $model->getYandexItem(),
    'mapOptions' => [
        'center' => [$model->latitude, $model->longitude], // центр карты
        'zoom' => 16, // показывать в масштабе
        'controls' => ['zoomControl'],  // использовать эл. управления
        'control' => [],
    ],
    'disableScroll' => true, // отключить скролл колесиком мыши (по умолчанию true)
    'windowWidth' => '100%', // длинна карты (по умолчанию 100%)
    'windowHeight' => '500px', // высота карты (по умолчанию 400px)
]);
?>