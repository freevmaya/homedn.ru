<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee}}`.
 */
class m190503_084938_create_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employee}}', [
            'id' => $this->primaryKey(),
            'fio' => $this->string(),
            'place' => $this->string(),
            'photo1' => $this->string(),
            'photo2' => $this->string(),
            'video' => $this->string(),
            'sort' => $this->integer(),
            'sort_slide' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employee}}');
    }
}
