<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%site_option}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%option_type}}`
 */
class m190304_112342_create_site_option_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%site_option}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(1024)->notNull(),
            'code' => $this->string(64)->notNull()->unique(),
            'value' => $this->text(),
            'sort' => $this->integer(),
            'option_type_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `option_type_id`
        $this->createIndex(
            '{{%idx-site_option-option_type_id}}',
            '{{%site_option}}',
            'option_type_id'
        );

        // add foreign key for table `{{%option_type}}`
        $this->addForeignKey(
            '{{%fk-site_option-option_type_id}}',
            '{{%site_option}}',
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
        // drops foreign key for table `{{%option_type}}`
        $this->dropForeignKey(
            '{{%fk-site_option-option_type_id}}',
            '{{%site_option}}'
        );

        // drops index for column `option_type_id`
        $this->dropIndex(
            '{{%idx-site_option-option_type_id}}',
            '{{%site_option}}'
        );

        $this->dropTable('{{%site_option}}');
    }
}
