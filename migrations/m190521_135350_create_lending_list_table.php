<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lending_list}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%page}}`
 */
class m190521_135350_create_lending_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lending_list}}', [
            'id' => $this->primaryKey(),
            'page_id' => $this->integer(),
            'image' => $this->string(),
            'name' => $this->string(),
            'desc' => $this->string(),
            'text' => $this->string(2048),
            'sort' => $this->integer(),
        ]);

        // creates index for column `page_id`
        $this->createIndex(
            '{{%idx-lending_list-page_id}}',
            '{{%lending_list}}',
            'page_id'
        );

        // add foreign key for table `{{%page}}`
        $this->addForeignKey(
            '{{%fk-lending_list-page_id}}',
            '{{%lending_list}}',
            'page_id',
            '{{%page}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%page}}`
        $this->dropForeignKey(
            '{{%fk-lending_list-page_id}}',
            '{{%lending_list}}'
        );

        // drops index for column `page_id`
        $this->dropIndex(
            '{{%idx-lending_list-page_id}}',
            '{{%lending_list}}'
        );

        $this->dropTable('{{%lending_list}}');
    }
}
