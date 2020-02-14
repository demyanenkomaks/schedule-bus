<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\RouteSchedule;

/**
 * RouteScheduleSearch represents the model behind the search form of `backend\models\RouteSchedule`.
 */
class RouteScheduleSearch extends RouteSchedule
{
    public $search;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'capacity'], 'integer'],
            [['otpr', 'prib', 'flight', 'route', 'car_model', 'periodicity', 'carrier', 'search'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = RouteSchedule::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'otpr' => SORT_ASC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
//            'id' => $this->id,
            'otpr' => $this->otpr,
            'prib' => $this->prib,
            'capacity' => $this->capacity,
        ]);

        $query->andFilterWhere(['ilike', 'flight', $this->flight])
            ->andFilterWhere(['ilike', 'route', $this->route])
            ->andFilterWhere(['ilike', 'car_model', $this->car_model])
            ->andFilterWhere(['ilike', 'periodicity', $this->periodicity])
            ->andFilterWhere(['ilike', 'carrier', $this->carrier]);

        if (!empty($this->search)) {
            $query->joinWith(['flights0', 'flights0.station'])
                ->andOnCondition(['station.id' => $this->search])
            ;
        }

//        debug($query->all());die;

        return $dataProvider;
    }
}
