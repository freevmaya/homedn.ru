<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page_option_value}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%page_option}}`
 * - `{{%page}}`
 */
class m190304_112345_create_page_option_value_table extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp ()
    {
        $this->createTable('{{%page_option_value}}', [
            'id'             => $this->primaryKey(),
            'page_option_id' => $this->integer(),
            'page_id'        => $this->integer(),
            'value'          => $this->text(),
        ]);

        // creates index for column `page_option_id`
        $this->createIndex(
                '{{%idx-page_option_value-page_option_id}}', '{{%page_option_value}}', 'page_option_id'
        );

        // add foreign key for table `{{%page_option}}`
        $this->addForeignKey(
                '{{%fk-page_option_value-page_option_id}}', '{{%page_option_value}}', 'page_option_id', '{{%page_option}}', 'id', 'CASCADE'
        );

        // creates index for column `page_id`
        $this->createIndex(
                '{{%idx-page_option_value-page_id}}', '{{%page_option_value}}', 'page_id'
        );

        // add foreign key for table `{{%page}}`
        $this->addForeignKey(
                '{{%fk-page_option_value-page_id}}', '{{%page_option_value}}', 'page_id', '{{%page}}', 'id', 'CASCADE'
        );

        $this->createIndex(
                '{{%idx-page_option_value-page_option_id-page_id}}', '{{%page_option_value}}', [
            'page_option_id',
            'page_id',
                ], true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown ()
    {
        $this->dropIndex(
                '{{%idx-page_option_value-page_option_id-page_id}}', '{{%page_option_value}}'
        );

        // drops foreign key for table `{{%page_option}}`
        $this->dropForeignKey(
                '{{%fk-page_option_value-page_option_id}}', '{{%page_option_value}}'
        );

        // drops index for column `page_option_id`
        $this->dropIndex(
                '{{%idx-page_option_value-page_option_id}}', '{{%page_option_value}}'
        );

        // drops foreign key for table `{{%page}}`
        $this->dropForeignKey(
                '{{%fk-page_option_value-page_id}}', '{{%page_option_value}}'
        );

        // drops index for column `page_id`
        $this->dropIndex(
                '{{%idx-page_option_value-page_id}}', '{{%page_option_value}}'
        );

        $this->dropTable('{{%page_option_value}}');
    }

}
