<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%calc_request}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%calckey}}`
 */
class m190519_112350_create_calc_request_table extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp ()
    {
        $this->createTable('{{%calc_request}}', [
            'id'         => $this->primaryKey(),
            'name'       => $this->string(),
            'phone'      => $this->string(),
            'calckey'    => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `calckey`
        $this->createIndex(
                '{{%idx-calc_request-calckey}}', '{{%calc_request}}', 'calckey'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown ()
    {
        // drops index for column `calckey`
        $this->dropIndex(
                '{{%idx-calc_request-calckey}}', '{{%calc_request}}'
        );

        $this->dropTable('{{%calc_request}}');
    }

}
