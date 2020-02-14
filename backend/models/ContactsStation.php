<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "contacts_station".
 *
 * @property int $id
 * @property string $title
 * @property string $address
 * @property string $working
 * @property string $contacts
 * @property string $latitude
 * @property string $longitude
 * @property int $created_at
 * @property int $updated_at
 * @property int $user_created
 * @property int $user_updated
 */
class ContactsStation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts_station';
    }

    public function behaviors()
    {
        return [
            [
                'class'      => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['created_at', 'updated_at', 'user_created', 'user_updated'], 'default', 'value' => null],
            [['created_at', 'updated_at', 'user_created', 'user_updated'], 'integer'],
            [['title', 'address', 'working', 'contacts'], 'string', 'max' => 255],
            [['latitude', 'longitude'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название автостанции',
            'address' => 'Адрес',
            'working' => 'Режим работы',
            'contacts' => 'Контакты',
            'latitude' => 'Широта',
            'longitude' => 'Долгота',
            'created_at' => 'Добавлен',
            'updated_at' => 'Отредактирован',
            'user_created' => 'Добавлен',
            'user_updated' => 'Отредактирован',
        ];
    }
    public function getYandexItem()
    {
        return [
            [
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'options' => [
                    [
                        'hintContent' => $this->title,
                        'balloonContentHeader' => $this->title,
                        'balloonContentBody' => \yii\widgets\DetailView::widget([

                            'model' => $this,
                            'attributes' => [
                                'address',
                                'working:ntext',
                                'contacts:ntext',
                            ],
                        ]),
                    ],
                    [
                        'preset' => 'islands#icon',
                        'iconColor' => '#3c8dbc'
                    ]
                ]
            ],
        ];
    }
}
