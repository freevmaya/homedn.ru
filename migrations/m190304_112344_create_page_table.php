<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%page_type}}`
 * - `{{%page}}`
 * - `{{%template}}`
 */
class m190304_112344_create_page_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(1024),
            'sort' => $this->integer(),
            'page_type_id' => $this->integer()->notNull(),
            'page_id' => $this->integer(),
            'template_id' => $this->integer(),
            'status' => $this->integer(1)->defaultValue(1),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `page_type_id`
        $this->createIndex(
            '{{%idx-page-page_type_id}}',
            '{{%page}}',
            'page_type_id'
        );

        // add foreign key for table `{{%page_type}}`
        $this->addForeignKey(
            '{{%fk-page-page_type_id}}',
            '{{%page}}',
            'page_type_id',
            '{{%page_type}}',
            'id',
            'CASCADE'
        );

        // creates index for column `page_id`
        $this->createIndex(
            '{{%idx-page-page_id}}',
            '{{%page}}',
            'page_id'
        );

        // add foreign key for table `{{%page}}`
        $this->addForeignKey(
            '{{%fk-page-page_id}}',
            '{{%page}}',
            'page_id',
            '{{%page}}',
            'id',
            'CASCADE'
        );

        // creates index for column `template_id`
        $this->createIndex(
            '{{%idx-page-template_id}}',
            '{{%page}}',
            'template_id'
        );

        // add foreign key for table `{{%template}}`
        $this->addForeignKey(
            '{{%fk-page-template_id}}',
            '{{%page}}',
            'template_id',
            '{{%template}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%page_type}}`
        $this->dropForeignKey(
            '{{%fk-page-page_type_id}}',
            '{{%page}}'
        );

        // drops index for column `page_type_id`
        $this->dropIndex(
            '{{%idx-page-page_type_id}}',
            '{{%page}}'
        );

        // drops foreign key for table `{{%page}}`
        $this->dropForeignKey(
            '{{%fk-page-page_id}}',
            '{{%page}}'
        );

        // drops index for column `page_id`
        $this->dropIndex(
            '{{%idx-page-page_id}}',
            '{{%page}}'
        );

        // drops foreign key for table `{{%template}}`
        $this->dropForeignKey(
            '{{%fk-page-template_id}}',
            '{{%page}}'
        );

        // drops index for column `template_id`
        $this->dropIndex(
            '{{%idx-page-template_id}}',
            '{{%page}}'
        );

        $this->dropTable('{{%page}}');
    }
}
