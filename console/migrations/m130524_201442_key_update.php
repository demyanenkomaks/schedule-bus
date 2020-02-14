<?php

use yii\db\Migration;

class m130524_201442_key_update extends Migration
{
    public function up()
    {
        $this->dropForeignKey(
            'route',
            '{{%flights}}'
        );

        $this->addForeignKey(
            'route',
            '{{%flights}}',
            'id_route',
            '{{%route_schedule}}',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        return false;
    }
}
