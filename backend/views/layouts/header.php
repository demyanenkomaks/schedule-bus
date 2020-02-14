<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">AUTO</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" id="menu">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <?php if(!Yii::$app->user->isGuest): ?>
        <div class="navbar-custom-menu">
            <div class="pull-right" style="margin: 7px;">
                <?= Html::a(
                    '('.\Yii::$app->user->identity->username.') Выйти',
                    ['/site/logout'],
                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                ) ?>
            </div>
        </div>
        <?php endif; ?>
    </nav>
</header>
