<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%price_option}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%price_caption}}`
 */
class m190504_190708_create_price_option_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%price_option}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'price_caption_id' => $this->integer()->notNull(),
            'min_price' => $this->integer(),
            'sort' => $this->integer(),
        ]);

        // creates index for column `price_caption_id`
        $this->createIndex(
            '{{%idx-price_option-price_caption_id}}',
            '{{%price_option}}',
            'price_caption_id'
        );

        // add foreign key for table `{{%price_caption}}`
        $this->addForeignKey(
            '{{%fk-price_option-price_caption_id}}',
            '{{%price_option}}',
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
            '{{%fk-price_option-price_caption_id}}',
            '{{%price_option}}'
        );

        // drops index for column `price_caption_id`
        $this->dropIndex(
            '{{%idx-price_option-price_caption_id}}',
            '{{%price_option}}'
        );

        $this->dropTable('{{%price_option}}');
    }
}
