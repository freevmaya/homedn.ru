<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%calc_collect}}`.
 */
class m190519_160921_create_calc_collect_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%calc_collect}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'sort' => $this->integer(),
            'image' => $this->string(),
            'link' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%calc_collect}}');
    }
}
