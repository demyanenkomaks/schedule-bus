<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "route_schedule".
 *
 * @property int $id
 * @property string $otpr
 * @property string $prib
 * @property string $flight
 * @property string $route
 * @property string $car_model
 * @property int $capacity
 * @property string $periodicity
 * @property string $carrier
 * @property string $url_pdf
 * @property string $file_bus
 */
class RouteSchedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'route_schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['otpr', 'prib'], 'safe'],
            [['flight', 'route', 'otpr', 'prib'], 'required'],
            [['route', 'car_model', 'periodicity', 'carrier', 'url_pdf', 'file_bus'], 'string'],
            [['capacity'], 'default', 'value' => null],
            [['capacity'], 'integer'],
            [['flight'], 'string', 'max' => 10],
            [['flight', 'flight'], 'unique', 'targetAttribute' => ['flight', 'flight']],
            [['url_pdf'], 'file', 'extensions' => 'pdf'],
            [['file_bus'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'otpr' => 'Отправление',
            'prib' => 'Прибытие',
            'flight' => 'Рейс',
            'route' => 'Маршрут',
            'car_model' => 'Марка автобуса',
            'capacity' => 'Вместимость',
            'periodicity' => 'Периодичность',
            'carrier' => 'Перевозчик',
            'url_pdf' => 'PDF с ценами',
            'file_bus' => 'Фото автобуса',
        ];
    }

    public function getFlights0()
    {
        return $this->hasMany(Flights::class, ['id_route' => 'id']);
    }

    public function getPdfView() {
        return !empty($this->url_pdf) ? '<a class="badge badge-info" style="white-space:normal!important;" href="' . $this->url_pdf . '" target="_blank">Уточнить стоимость</a>' : '<span class="badge badge-danger" style="white-space:normal!important;">Стоимость уточняйте в кассе</span>';
    }
    public function getPdfUpdate() {
        return !empty($this->url_pdf) ? '<a href="' . $this->url_pdf . '" target="_blank"><span class="btn btn-info btn-block normal">Уточнить стоимость</span></a>' : '<a href="#" class="btn btn-info btn-block normal disabled" role="button" aria-disabled="true">Не загружен</a>';
    }

    public function getBusView() {
        return !empty($this->file_bus) ? '<a class="badge badge-info" style="white-space:normal!important;" href="' . $this->file_bus . '" target="_blank">Просмотреть автобус</a>' : '<span class="badge badge-danger" style="white-space:normal!important;">Не загружено</span>';
    }
    public function getBusUpdate() {
        return !empty($this->file_bus) ? '<a href="' . $this->file_bus . '" target="_blank"><span class="btn btn-info btn-block normal">Просмотреть автобус</span></a>' : '<a href="#" class="btn btn-info btn-block normal disabled" role="button" aria-disabled="true">Не загружено</a>';
    }
}
