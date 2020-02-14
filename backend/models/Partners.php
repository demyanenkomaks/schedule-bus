<?php

namespace backend\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "partners".
 *
 * @property int $id
 * @property string $title
 * @property string $img
 * @property string $url
 */
class Partners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'img', 'url'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Партнер',
            'img' => 'Логотип',
            'url' => 'Ссылка на сайт',
        ];
    }

    public function getImgUpdate() {
        return !empty($this->img) ? Html::a('Просмотреть логотип партнера', '/logo_partners/200x_/' . $this->img, ['class' => 'btn btn-info btn-block normal', 'target' => '_blank']) : '<a href="#" class="btn btn-info btn-block normal disabled" role="button" aria-disabled="true">Не загружено</a>';
    }

    public function getUrlUpdate() {
        return !empty($this->url) ? Html::a('Перейти', $this->url, ['class' => 'btn btn-info btn-block normal', 'target' => '_blank']) : '';
    }
}
