<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%measure}}`.
 */
class m190502_122727_create_measure_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%measure}}', [
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
        $this->dropTable('{{%measure}}');
    }
}
