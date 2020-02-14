<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>
    <p class="pad-top-15">
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить данную запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'otpr:time',
        'prib:time',
        'flight',
        'route:ntext',
        'car_model:ntext',
        'capacity',
        'periodicity:ntext',
        'carrier:ntext',
        [
            'attribute' => 'url_pdf',
            'format' => 'raw',
            'value' => $model->pdfUpdate,
        ],
        [
            'attribute' => 'file_bus',
            'format' => 'raw',
            'value' => function($data){
                return $data->file_bus ? '<img src="' . $data->file_bus . '" alt="" style="width:50px">' : null;
            }
        ],
    ],
]) ?>