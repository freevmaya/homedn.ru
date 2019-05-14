<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%portfolio_gallery}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%page}}`
 */
class m190513_134140_create_portfolio_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%portfolio_gallery}}', [
            'id' => $this->primaryKey(),
            'gallery_type' => $this->integer()->notNull(),
            'page_id' => $this->integer()->notNull(),
            'sort' => $this->integer(),
            'image' => $this->string()->notNull(),
        ]);

        // creates index for column `page_id`
        $this->createIndex(
            '{{%idx-portfolio_gallery-page_id}}',
            '{{%portfolio_gallery}}',
            'page_id'
        );

        // add foreign key for table `{{%page}}`
        $this->addForeignKey(
            '{{%fk-portfolio_gallery-page_id}}',
            '{{%portfolio_gallery}}',
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
            '{{%fk-portfolio_gallery-page_id}}',
            '{{%portfolio_gallery}}'
        );

        // drops index for column `page_id`
        $this->dropIndex(
            '{{%idx-portfolio_gallery-page_id}}',
            '{{%portfolio_gallery}}'
        );

        $this->dropTable('{{%portfolio_gallery}}');
    }
}
