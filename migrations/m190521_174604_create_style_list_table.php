<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%style_list}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%page}}`
 */
class m190521_174604_create_style_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%style_list}}', [
            'id' => $this->primaryKey(),
            'page_id' => $this->integer(),
            'image' => $this->string(),
            'name' => $this->string(),
            'sort' => $this->integer(),
            'desc' => $this->string(),
            'color1' => $this->string(),
            'color2' => $this->string(),
            'color3' => $this->string(),
        ]);

        // creates index for column `page_id`
        $this->createIndex(
            '{{%idx-style_list-page_id}}',
            '{{%style_list}}',
            'page_id'
        );

        // add foreign key for table `{{%page}}`
        $this->addForeignKey(
            '{{%fk-style_list-page_id}}',
            '{{%style_list}}',
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
            '{{%fk-style_list-page_id}}',
            '{{%style_list}}'
        );

        // drops index for column `page_id`
        $this->dropIndex(
            '{{%idx-style_list-page_id}}',
            '{{%style_list}}'
        );

        $this->dropTable('{{%style_list}}');
    }
}
