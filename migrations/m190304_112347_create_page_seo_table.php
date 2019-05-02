<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page_seo}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%page}}`
 */
class m190304_112347_create_page_seo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page_seo}}', [
            'id' => $this->primaryKey(),
            'page_id' => $this->integer()->notNull(),
            'url' => $this->string(1024)->notNull(),
            'h1' => $this->string(1024),
            'title' => $this->string(1024),
            'keywords' => $this->string(1024),
            'description' => $this->string(1024),
            'content' => $this->text(),
            'noindex' => $this->integer(1)->defaultValue(0),
        ]);

        // creates index for column `page_id`
        $this->createIndex(
            '{{%idx-page_seo-page_id}}',
            '{{%page_seo}}',
            'page_id'
        );

        // add foreign key for table `{{%page}}`
        $this->addForeignKey(
            '{{%fk-page_seo-page_id}}',
            '{{%page_seo}}',
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
            '{{%fk-page_seo-page_id}}',
            '{{%page_seo}}'
        );

        // drops index for column `page_id`
        $this->dropIndex(
            '{{%idx-page_seo-page_id}}',
            '{{%page_seo}}'
        );

        $this->dropTable('{{%page_seo}}');
    }
}
