<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        $menuItems = [
            ['label' => 'Главная', 'url' => '/'],
            ['label' => 'Информация для пассажиров', 'items' => [
                    ['label' => 'Расписание автобусов', 'url' => '/site/bus-timetable'],
                    ['label' => 'Как добраться', 'url' => '/site/how-to-get'],
                ]
            ],
            ['label' => 'Услуги', 'url' => '/site/services'],
            ['label' => 'Новости', 'url' => '/site/news'],
            ['label' => 'Автостанции', 'url' => '/site/bus-station'],
            ['label' => 'Партнеры', 'url' => '/site/partners'],
        ];
        ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?=Yii::$app->homeUrl?>"><div class="logo"></div><span>Республиканский центр <br> организации перевозок</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php foreach($menuItems as $item):?>
                        <?php if(isset( $item['url'] )):?>
                            <li class="nav-item">
                                <a class="nav-link <?=$item['class']??null?>" href="<?=$item['url']?>"><?=$item['label']?><span class="sr-only">(current)</span></a>
                            </li>
                        <?php elseif(isset( $item['items']) ):?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?=$item['label']?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <?php foreach($item['items'] as $ddItem):?>
                                        <a class="dropdown-item" href="<?=$ddItem['url']?>"><?=$ddItem['label']?></a>
                                    <?php endforeach?>
                                </div>
                            </li>
                        <?php endif?>
                    <?php endforeach?>
                </ul>
            </div>
        </nav>


            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>

    </div>

    <footer class="footer">
        <div class="container">
            <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

            <p class="float-right">Powered by <?= Html::a('OOO "NASKA" - LUGANSK', 'https://naska.pro/') ?></p>
        </div>
    </footer>
    <div class="ticker">
            <?=$this->render('_ticker')?>
    </div>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>