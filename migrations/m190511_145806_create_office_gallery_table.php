<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%office_gallery}}`.
 */
class m190511_145806_create_office_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%office_gallery}}', [
            'id' => $this->primaryKey(),
            'sort' => $this->integer(),
            'image' => $this->string()->notNull(),
            'inwidget' => $this->integer()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%office_gallery}}');
    }
}
