<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%main_portfolio_gallery}}`.
 */
class m190506_063025_create_main_portfolio_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%main_portfolio_gallery}}', [
            'id' => $this->primaryKey(),
            'sort' => $this->integer(),
            'image' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%main_portfolio_gallery}}');
    }
}
