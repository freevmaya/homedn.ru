<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%calc_component_group}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%calc_room}}`
 */
class m190515_073203_create_calc_component_group_table extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp ()
    {
        $this->createTable('{{%calc_component_group}}', [
            'id'           => $this->primaryKey(),
            'name'         => $this->string(),
            'sort'         => $this->integer(),
            'image_order'  => $this->integer(),
            'size_element' => $this->integer()->defaultValue(1),
            'calc_room_id' => $this->integer(),
        ]);

        // creates index for column `calc_room_id`
        $this->createIndex(
                '{{%idx-calc_component_group-calc_room_id}}', '{{%calc_component_group}}', 'calc_room_id'
        );

        // add foreign key for table `{{%calc_room}}`
        $this->addForeignKey(
                '{{%fk-calc_component_group-calc_room_id}}', '{{%calc_component_group}}', 'calc_room_id', '{{%calc_room}}', 'id', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown ()
    {
        // drops foreign key for table `{{%calc_room}}`
        $this->dropForeignKey(
                '{{%fk-calc_component_group-calc_room_id}}', '{{%calc_component_group}}'
        );

        // drops index for column `calc_room_id`
        $this->dropIndex(
                '{{%idx-calc_component_group-calc_room_id}}', '{{%calc_component_group}}'
        );

        $this->dropTable('{{%calc_component_group}}');
    }

}
