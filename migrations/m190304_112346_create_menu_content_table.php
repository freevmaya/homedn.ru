<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menu_content}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%menu}}`
 * - `{{%page}}`
 * - `{{%menu_content}}`
 */
class m190304_112346_create_menu_content_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%menu_content}}', [
            'id' => $this->primaryKey(),
            'menu_id' => $this->integer(),
            'name' => $this->string(1024)->notNull(),
            'url' => $this->string(1024),
            'page_id' => $this->integer(),
            'sort' => $this->integer(),
            'menu_content_id' => $this->integer(),
        ]);

        // creates index for column `menu_id`
        $this->createIndex(
            '{{%idx-menu_content-menu_id}}',
            '{{%menu_content}}',
            'menu_id'
        );

        // add foreign key for table `{{%menu}}`
        $this->addForeignKey(
            '{{%fk-menu_content-menu_id}}',
            '{{%menu_content}}',
            'menu_id',
            '{{%menu}}',
            'id',
            'CASCADE'
        );

        // creates index for column `page_id`
        $this->createIndex(
            '{{%idx-menu_content-page_id}}',
            '{{%menu_content}}',
            'page_id'
        );

        // add foreign key for table `{{%page}}`
        $this->addForeignKey(
            '{{%fk-menu_content-page_id}}',
            '{{%menu_content}}',
            'page_id',
            '{{%page}}',
            'id',
            'CASCADE'
        );

        // creates index for column `menu_content_id`
        $this->createIndex(
            '{{%idx-menu_content-menu_content_id}}',
            '{{%menu_content}}',
            'menu_content_id'
        );

        // add foreign key for table `{{%menu_content}}`
        $this->addForeignKey(
            '{{%fk-menu_content-menu_content_id}}',
            '{{%menu_content}}',
            'menu_content_id',
            '{{%menu_content}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%menu}}`
        $this->dropForeignKey(
            '{{%fk-menu_content-menu_id}}',
            '{{%menu_content}}'
        );

        // drops index for column `menu_id`
        $this->dropIndex(
            '{{%idx-menu_content-menu_id}}',
            '{{%menu_content}}'
        );

        // drops foreign key for table `{{%page}}`
        $this->dropForeignKey(
            '{{%fk-menu_content-page_id}}',
            '{{%menu_content}}'
        );

        // drops index for column `page_id`
        $this->dropIndex(
            '{{%idx-menu_content-page_id}}',
            '{{%menu_content}}'
        );

        // drops foreign key for table `{{%menu_content}}`
        $this->dropForeignKey(
            '{{%fk-menu_content-menu_content_id}}',
            '{{%menu_content}}'
        );

        // drops index for column `menu_content_id`
        $this->dropIndex(
            '{{%idx-menu_content-menu_content_id}}',
            '{{%menu_content}}'
        );

        $this->dropTable('{{%menu_content}}');
    }
}
