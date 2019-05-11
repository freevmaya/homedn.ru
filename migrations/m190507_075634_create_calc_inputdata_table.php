<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%calc_inputdata}}`.
 */
class m190507_075634_create_calc_inputdata_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%calc_inputdata}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string(32)->notNull(),
            'user_data' => $this->string(2048),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%calc_inputdata}}');
    }
}
