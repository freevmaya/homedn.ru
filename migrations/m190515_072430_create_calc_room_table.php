<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%calc_room}}`.
 */
class m190515_072430_create_calc_room_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%calc_room}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'baseimage' => $this->string(),
            'sort' => $this->integer(),
            'price' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%calc_room}}');
    }
}
