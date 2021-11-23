<?php

use yii\db\Migration;

class m211123_131058_book_author extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('book_author', [
            'book_id' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey(
            'bookId',
            'book_author',
            'book_id',
            'books',
            'id',
            'RESTRICT',
            'RESTRICT'
        );

        $this->addForeignKey(
            'authorId',
            'book_author',
            'author_id',
            'authors',
            'id',
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey(
            'bookId',
            'book_author'
        );

        $this->dropForeignKey(
            'authorId',
            'book_author'
        );

        $this->dropTable('book_author');
    }
}
