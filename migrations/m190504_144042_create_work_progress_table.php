<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%work_progress}}`.
 */
class m190504_144042_create_work_progress_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%work_progress}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'image' => $this->string(),
            'text' => $this->string(),
            'link' => $this->string(),
            'url' => $this->string(),
            'sort' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%work_progress}}');
    }
}
