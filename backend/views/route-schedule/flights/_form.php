<?php

use kartik\widgets\Select2;
use kartik\widgets\TimePicker;
use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\widgets\MaskedInput;
//use kartik\date\DatePicker;
//use kartik\select2\Select2;

DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
    'widgetBody'      => '.container-items', // required: css class selector
    'widgetItem'      => '.item', // required: css class
    'limit'           => 20, // the maximum times, an element can be cloned (default 999)
    'min'             => 1, // 0 or 1 (default 1)
    'insertButton'    => '.add-item' , // css class
    'deleteButton'    => '.remove-item', // css class
    'model'           => $models_flights[0],
    'formId'          => 'flights-id',
    'formFields'      => [
        'id_station',
        'order' ,
    ],
]);
?>
    <div class="panel panel-default">
        <div class="panel-heading control-label">
            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i>
                Добавить
            </button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($models_flights as $index => $model): ?>
                <div class="item panel panel-default"><!-- widgetBody -->

                    <div class="panel-body">
                        <?php
                        // necessary for update action.
                        if (!$model->isNewRecord) {
                            echo Html::activeHiddenInput($model, "[{$index}]id");
                        }
                        ?>

                        <div class="row">
                            <div class="col-md-3">
                                <?= $form->field($model, "[{$index}]order")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, "[{$index}]id_station")->widget(Select2::class,[
                                    'data' => $stationList,
                                    'language' => 'ru',
                                    'options' => [
                                        'placeholder' => '',
                                    ],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                                ]) ?>
                            </div>
                            <div class="col-md-3 pad-top-30">
                                <button type="button" class="remove-item btn btn-danger"><i class="fa fa-minus"></i> Удалить</button>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php DynamicFormWidget::end(); ?>