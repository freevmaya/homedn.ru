<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%callorder}}`.
 */
class m190501_110509_create_callorder_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%callorder}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'phone' => $this->string()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%callorder}}');
    }
}
