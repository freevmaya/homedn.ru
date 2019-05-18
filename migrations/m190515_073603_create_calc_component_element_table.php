<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%calc_component_element}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%calc_group}}`
 */
class m190515_073603_create_calc_component_element_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%calc_component_element}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'desc' => $this->string(),
            'sort' => $this->integer(),
            'default' => $this->integer()->defaultValue(0),
            'group_id' => $this->integer(),
            'local_group' => $this->string(),
            'price' => $this->integer()->defaultValue(0),
            'icon' => $this->string(),
            'image' => $this->string(),
        ]);

        // creates index for column `calc_group_id`
        $this->createIndex(
            '{{%idx-calc_component_element-group_id}}',
            '{{%calc_component_element}}',
            'group_id'
        );

        // add foreign key for table `{{%calc_group}}`
        $this->addForeignKey(
            '{{%fk-calc_component_element-group_id}}',
            '{{%calc_component_element}}',
            'group_id',
            '{{%calc_component_group}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%calc_component_group}}`
        $this->dropForeignKey(
            '{{%fk-calc_component_element-group_id}}',
            '{{%calc_component_element}}'
        );

        // drops index for column `calc_group_id`
        $this->dropIndex(
            '{{%idx-calc_component_element-group_id}}',
            '{{%calc_component_element}}'
        );

        $this->dropTable('{{%calc_component_element}}');
    }
}
