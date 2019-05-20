<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%calc_complect_content}}`.
 */
class m190519_211338_create_calc_complect_content_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%calc_complect_content}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->string(1024),
            'image' => $this->string(),
            'sort' => $this->integer(),
            'mandatory' => $this->integer(),
            'price' => $this->integer(),
            'countable' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%calc_complect_content}}');
    }
}
