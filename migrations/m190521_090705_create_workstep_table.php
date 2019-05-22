<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%workstep}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%page}}`
 */
class m190521_090705_create_workstep_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%workstep}}', [
            'id' => $this->primaryKey(),
            'page_id' => $this->integer(),
            'name' => $this->string(),
            'image' => $this->string(),
            'description' => $this->string(2048),
            'sort' => $this->integer(),
        ]);

        // creates index for column `page_id`
        $this->createIndex(
            '{{%idx-workstep-page_id}}',
            '{{%workstep}}',
            'page_id'
        );

        // add foreign key for table `{{%page}}`
        $this->addForeignKey(
            '{{%fk-workstep-page_id}}',
            '{{%workstep}}',
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
            '{{%fk-workstep-page_id}}',
            '{{%workstep}}'
        );

        // drops index for column `page_id`
        $this->dropIndex(
            '{{%idx-workstep-page_id}}',
            '{{%workstep}}'
        );

        $this->dropTable('{{%workstep}}');
    }
}
