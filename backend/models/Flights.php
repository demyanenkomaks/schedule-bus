<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "flights".
 *
 * @property int $id
 * @property int $id_route
 * @property int $id_station
 * @property int $order
 *
 * @property RouteSchedule $route
 * @property Station $station
 */
class Flights extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'flights';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_station'], 'required'],
            [['id_route', 'id_station', 'order'], 'default', 'value' => null],
            [['id_route', 'id_station', 'order'], 'integer'],
            [['id_route'], 'exist', 'skipOnError' => true, 'targetClass' => RouteSchedule::class, 'targetAttribute' => ['id_route' => 'id']],
            [['id_station'], 'exist', 'skipOnError' => true, 'targetClass' => Station::class, 'targetAttribute' => ['id_station' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_route' => 'Маршрут',
            'id_station' => 'Станция',
            'order' => 'Порядок',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoute()
    {
        return $this->hasOne(RouteSchedule::class, ['id' => 'id_route']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStation()
    {
        return $this->hasOne(Station::class, ['id' => 'id_station']);
    }

    public function getStationName()
    {
        return $this->station ? $this->station->title . ' (' . $this->station->address . ')' : '';
    }

}
