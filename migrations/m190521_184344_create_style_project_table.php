<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%style_project}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%style_list}}`
 */
class m190521_184344_create_style_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%style_project}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'phone' => $this->string(),
            'style_list_id' => $this->integer(),
            'color' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `style_list_id`
        $this->createIndex(
            '{{%idx-style_project-style_list_id}}',
            '{{%style_project}}',
            'style_list_id'
        );

        // add foreign key for table `{{%style_list}}`
        $this->addForeignKey(
            '{{%fk-style_project-style_list_id}}',
            '{{%style_project}}',
            'style_list_id',
            '{{%style_list}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%style_list}}`
        $this->dropForeignKey(
            '{{%fk-style_project-style_list_id}}',
            '{{%style_project}}'
        );

        // drops index for column `style_list_id`
        $this->dropIndex(
            '{{%idx-style_project-style_list_id}}',
            '{{%style_project}}'
        );

        $this->dropTable('{{%style_project}}');
    }
}
