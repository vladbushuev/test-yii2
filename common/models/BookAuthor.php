<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "book_author".
 *
 * @property int $book_id
 * @property int $author_id
 */
class BookAuthor extends ActiveRecord
{
    public static function tableName()
    {
        return 'book_author';
    }

    public function rules()
    {
        return [
            [['book_id', 'author_id'], 'required'],
            [['book_id', 'author_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'book_id' => 'Book ID',
            'author_id' => 'Author ID',
        ];
    }
}
