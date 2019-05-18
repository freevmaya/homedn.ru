<?php

use yii\db\Migration;

/**
 * Handles dropping price from table `{{%calc_room}}`.
 */
class m190516_130035_drop_price_column_from_calc_room_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%calc_room}}', 'price');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
