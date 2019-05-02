<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%social}}`.
 */
class m190501_171533_create_social_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%social}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'url' => $this->string()->notNull(),
            'sort' => $this->integer(),
            'icon_top' => $this->string(),
            'icon_foz' => $this->string(),
            'icon_footer' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%social}}');
    }
}
