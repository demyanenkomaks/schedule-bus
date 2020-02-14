<?php

use yii\helpers\Html;

$this->title = $model->title;

?>


<div class="container">
    <div class="col-md-12 text-center">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-md-12">
        <?= !empty($model->text_full) ? $model->text_full : $model->abbreviated ?>
    </div>
</div>
