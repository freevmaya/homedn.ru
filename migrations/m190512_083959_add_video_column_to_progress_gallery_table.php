<?php

use yii\db\Migration;

/**
 * Handles adding video to table `{{%progress_gallery}}`.
 */
class m190512_083959_add_video_column_to_progress_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%progress_gallery}}', 'video', $this->string(4096));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%progress_gallery}}', 'video');
    }
}
