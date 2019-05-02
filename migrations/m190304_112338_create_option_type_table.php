<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%option_type}}`.
 */
class m190304_112338_create_option_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%option_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(1024),
            'field' => $this->string(16)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%option_type}}');
    }
}
