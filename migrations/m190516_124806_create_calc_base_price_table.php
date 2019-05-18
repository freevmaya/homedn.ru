<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%calc_base_price}}`.
 */
class m190516_124806_create_calc_base_price_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%calc_base_price}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'price' => $this->integer(),
            'inputdata' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%calc_base_price}}');
    }
}
