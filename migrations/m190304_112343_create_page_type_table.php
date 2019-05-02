<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page_type}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%template}}`
 */
class m190304_112343_create_page_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
            'code' => $this->string(32)->unique()->notNull(),
            'template_id' => $this->integer(),
        ]);

        // creates index for column `template_id`
        $this->createIndex(
            '{{%idx-page_type-template_id}}',
            '{{%page_type}}',
            'template_id'
        );

        // add foreign key for table `{{%template}}`
        $this->addForeignKey(
            '{{%fk-page_type-template_id}}',
            '{{%page_type}}',
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
        // drops foreign key for table `{{%template}}`
        $this->dropForeignKey(
            '{{%fk-page_type-template_id}}',
            '{{%page_type}}'
        );

        // drops index for column `template_id`
        $this->dropIndex(
            '{{%idx-page_type-template_id}}',
            '{{%page_type}}'
        );

        $this->dropTable('{{%page_type}}');
    }
}
