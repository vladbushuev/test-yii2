<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\query\BooksQuery;

/**
 * This is the model class for table "books".
 *
 * @property int $id Первичный ключ
 * @property string $title Название книги
 */
class Books extends ActiveRecord
{
    public $author_ids;

    public static function tableName()
    {
        return 'books';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'min'=>1, 'max'=>70],

            [['author_ids'], 'required'],
            [['author_ids'], 'each', 'rule' => ['integer']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название книги',
        ];
    }

    public function dataPrep()
    {
        if(!empty($this->author_ids)) {
            foreach ($this->author_ids as $key => $value) {
                $author = Authors::find()->where(['id' => $value])->one();
                if(empty($author)) {
                    $newAuthor = new Authors();
                    $newAuthor->fio = $value;
                    $newAuthor->save();
                    $this->author_ids[$key] = $newAuthor->id;
                }
            }
        }

        if ($this->save()) {
            if (!empty($this->author_ids)) {
                self::setAuthor($this);
            }

            return true;
        }

        return false;
    }

    /**
     * Многие ко многим установка параметров (Авторы)
     */
    public static function setAuthor($model)
    {
        BookAuthor::deleteAll(['book_id' => $model->id]);

        foreach ($model->author_ids as $author_ids) {
            $bookAuthor = new BookAuthor();
            $bookAuthor->book_id = $model->id;
            $bookAuthor->author_id = $author_ids;
            $bookAuthor->save();
        }
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\BooksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BooksQuery(get_called_class());
    }

    public function getAuthors()
    {
        return $this->hasMany(Authors::class, ['id' => 'author_id'])
            ->viaTable(BookAuthor::tableName(), ['book_id' => 'id']);
    }

    public function beforeDelete()
    {
        //Удалим все связи с авторами
        BookAuthor::deleteAll(['book_id' => $this->id]);

        return parent::beforeDelete();
    }
}
