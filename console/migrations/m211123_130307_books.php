<?php

use yii\db\Migration;

class m211123_130307_books extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('books', [
            'id' => $this->primaryKey(),
            'title' => $this->string(70)->notNull(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('books');
    }
}
