<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%price_element}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%price_caption}}`
 */
class m190504_190930_create_price_element_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%price_element}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'price_caption_id' => $this->integer()->notNull(),
            'description' => $this->string(1024),
            'sort' => $this->integer(),
        ]);

        // creates index for column `price_caption_id`
        $this->createIndex(
            '{{%idx-price_element-price_caption_id}}',
            '{{%price_element}}',
            'price_caption_id'
        );

        // add foreign key for table `{{%price_caption}}`
        $this->addForeignKey(
            '{{%fk-price_element-price_caption_id}}',
            '{{%price_element}}',
            'price_caption_id',
            '{{%price_caption}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%price_caption}}`
        $this->dropForeignKey(
            '{{%fk-price_element-price_caption_id}}',
            '{{%price_element}}'
        );

        // drops index for column `price_caption_id`
        $this->dropIndex(
            '{{%idx-price_element-price_caption_id}}',
            '{{%price_element}}'
        );

        $this->dropTable('{{%price_element}}');
    }
}
