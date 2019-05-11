<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%portfolio_review}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%page}}`
 */
class m190506_101650_create_portfolio_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%portfolio_review}}', [
            'id' => $this->primaryKey(),
            'header' => $this->string(),
            'page_id' => $this->integer()->notNull(),
            'video' => $this->string(),
            'cover' => $this->string(),
            'sort' => $this->integer(),
        ]);

        // creates index for column `page_id`
        $this->createIndex(
            '{{%idx-portfolio_review-page_id}}',
            '{{%portfolio_review}}',
            'page_id'
        );

        // add foreign key for table `{{%page}}`
        $this->addForeignKey(
            '{{%fk-portfolio_review-page_id}}',
            '{{%portfolio_review}}',
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
            '{{%fk-portfolio_review-page_id}}',
            '{{%portfolio_review}}'
        );

        // drops index for column `page_id`
        $this->dropIndex(
            '{{%idx-portfolio_review-page_id}}',
            '{{%portfolio_review}}'
        );

        $this->dropTable('{{%portfolio_review}}');
    }
}
