<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lending_gallery}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%page}}`
 */
class m190521_110244_create_lending_gallery_table extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp ()
    {
        $this->createTable('{{%lending_gallery}}', [
            'id'      => $this->primaryKey(),
            'page_id' => $this->integer(),
            'sort'    => $this->integer(),
            'image'   => $this->string(),
        ]);

        // creates index for column `page_id`
        $this->createIndex(
                '{{%idx-lending_gallery-page_id}}', '{{%lending_gallery}}', 'page_id'
        );

        // add foreign key for table `{{%page}}`
        $this->addForeignKey(
                '{{%fk-lending_gallery-page_id}}', '{{%lending_gallery}}', 'page_id', '{{%page}}', 'id', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown ()
    {
        // drops foreign key for table `{{%page}}`
        $this->dropForeignKey(
                '{{%fk-lending_gallery-page_id}}', '{{%lending_gallery}}'
        );

        // drops index for column `page_id`
        $this->dropIndex(
                '{{%idx-lending_gallery-page_id}}', '{{%lending_gallery}}'
        );

        $this->dropTable('{{%lending_gallery}}');
    }

}
