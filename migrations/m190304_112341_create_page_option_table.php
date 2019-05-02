<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page_option}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%template}}`
 * - `{{%option_type}}`
 */
class m190304_112341_create_page_option_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page_option}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'code' => $this->string(64)->notNull()->unique(),
            'default_value' => $this->text(),
            'sort' => $this->integer(),
            'template_id' => $this->integer(),
            'option_type_id' => $this->integer(),
        ]);

        // creates index for column `template_id`
        $this->createIndex(
            '{{%idx-page_option-template_id}}',
            '{{%page_option}}',
            'template_id'
        );

        // add foreign key for table `{{%template}}`
        $this->addForeignKey(
            '{{%fk-page_option-template_id}}',
            '{{%page_option}}',
            'template_id',
            '{{%template}}',
            'id',
            'CASCADE'
        );

        // creates index for column `option_type_id`
        $this->createIndex(
            '{{%idx-page_option-option_type_id}}',
            '{{%page_option}}',
            'option_type_id'
        );

        // add foreign key for table `{{%option_type}}`
        $this->addForeignKey(
            '{{%fk-page_option-option_type_id}}',
            '{{%page_option}}',
            'option_type_id',
            '{{%option_type}}',
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
            '{{%fk-page_option-template_id}}',
            '{{%page_option}}'
        );

        // drops index for column `template_id`
        $this->dropIndex(
            '{{%idx-page_option-template_id}}',
            '{{%page_option}}'
        );

        // drops foreign key for table `{{%option_type}}`
        $this->dropForeignKey(
            '{{%fk-page_option-option_type_id}}',
            '{{%page_option}}'
        );

        // drops index for column `option_type_id`
        $this->dropIndex(
            '{{%idx-page_option-option_type_id}}',
            '{{%page_option}}'
        );

        $this->dropTable('{{%page_option}}');
    }
}
