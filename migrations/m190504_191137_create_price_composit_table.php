<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%price_composit}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%price_option}}`
 * - `{{%price_element}}`
 */
class m190504_191137_create_price_composit_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%price_composit}}', [
            'id' => $this->primaryKey(),
            'price_option_id' => $this->integer()->notNull(),
            'price_element_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `price_option_id`
        $this->createIndex(
            '{{%idx-price_composit-price_option_id}}',
            '{{%price_composit}}',
            'price_option_id'
        );

        // add foreign key for table `{{%price_option}}`
        $this->addForeignKey(
            '{{%fk-price_composit-price_option_id}}',
            '{{%price_composit}}',
            'price_option_id',
            '{{%price_option}}',
            'id',
            'CASCADE'
        );

        // creates index for column `price_element_id`
        $this->createIndex(
            '{{%idx-price_composit-price_element_id}}',
            '{{%price_composit}}',
            'price_element_id'
        );

        // add foreign key for table `{{%price_element}}`
        $this->addForeignKey(
            '{{%fk-price_composit-price_element_id}}',
            '{{%price_composit}}',
            'price_element_id',
            '{{%price_element}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%price_option}}`
        $this->dropForeignKey(
            '{{%fk-price_composit-price_option_id}}',
            '{{%price_composit}}'
        );

        // drops index for column `price_option_id`
        $this->dropIndex(
            '{{%idx-price_composit-price_option_id}}',
            '{{%price_composit}}'
        );

        // drops foreign key for table `{{%price_element}}`
        $this->dropForeignKey(
            '{{%fk-price_composit-price_element_id}}',
            '{{%price_composit}}'
        );

        // drops index for column `price_element_id`
        $this->dropIndex(
            '{{%idx-price_composit-price_element_id}}',
            '{{%price_composit}}'
        );

        $this->dropTable('{{%price_composit}}');
    }
}
