<?php
$slides[] = [
  'img' => "/frontend/web/img/slider/lugansk-1.jpg",
  'text' => "Луганск",
];
$slides[] = [
  'img' => "/frontend/web/img/slider/msk-1.jpg",
  'text' => "Москва",
];
$slides[] = [
  'img' => "/frontend/web/img/slider/sochi-1.jpg",
  'text' => "Сочи",
];
$slides[] = [
  'img' => "/frontend/web/img/slider/spb-1.jpg",
  'text' => "Санкт-Петербург",
];
$slides[] = [
  'img' => "/frontend/web/img/slider/volgograd-1.jpg",
  'text' => "Волгоград",
];
$slides[] = [
  'img' => "/frontend/web/img/slider/voronej-1.jpg",
  'text' => "Воронеж",
];
$slides[] = [
  'img' => "/frontend/web/img/slider/rostov-1.jpg",
  'text' => "Ростов-на-Дону",
];
$slides[] = [
  'img' => "/frontend/web/img/slider/yalta-1.jpg",
  'text' => "Ялта",
];
$slides[] = [
  'img' => "/frontend/web/img/slider/sevastopol.jpg",
  'text' => "Севастополь",
];
?>
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <?php for ($i = 0; $i < count($slides); $i++) : ?>
      <li data-target="#demo" data-slide-to=<?=$i?> class=<?= $i == 0 ? "active" : null ?>></li>
    <?php endfor; ?>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <?php foreach($slides as $i => $slide):?>
      <div class="carousel-item <?=$i == 0 ? "active" : null?>">
        <div class="img" style="background-image: url(<?=$slide['img']?>);">
          <div class="text"><?=$slide['text']?></div>
        </div>
      </div>
    <?php endforeach?>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>