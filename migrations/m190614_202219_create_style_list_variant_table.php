<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%style_list_variant}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%style_list}}`
 */
class m190614_202219_create_style_list_variant_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%style_list_variant}}', [
            'id' => $this->primaryKey(),
            'style_list_id' => $this->integer()->notNull(),
            'color' => $this->string()->notNull(),
            'image' => $this->string()->notNull(),
            'sort' => $this->integer(),
        ]);

        // creates index for column `style_list_id`
        $this->createIndex(
            '{{%idx-style_list_variant-style_list_id}}',
            '{{%style_list_variant}}',
            'style_list_id'
        );

        // add foreign key for table `{{%style_list}}`
        $this->addForeignKey(
            '{{%fk-style_list_variant-style_list_id}}',
            '{{%style_list_variant}}',
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
            '{{%fk-style_list_variant-style_list_id}}',
            '{{%style_list_variant}}'
        );

        // drops index for column `style_list_id`
        $this->dropIndex(
            '{{%idx-style_list_variant-style_list_id}}',
            '{{%style_list_variant}}'
        );

        $this->dropTable('{{%style_list_variant}}');
    }
}
