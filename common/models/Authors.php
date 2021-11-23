<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use common\models\query\AuthorsQuery;

/**
 * This is the model class for table "authors".
 *
 * @property int $id Первичный ключ
 * @property string $fio ФИО
 */
class Authors extends ActiveRecord
{
    public static function tableName()
    {
        return 'authors';
    }

    public function rules()
    {
        return [
            [['fio'], 'required'],
            [['fio'], 'string', 'min'=>2, 'max'=>255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
        ];
    }

    public static function dropDown()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'fio');
    }

    public static function getListForSelect($attributeName = null)
    {
        $values = [];
        if (!is_null($attributeName)) {
            $values =  ArrayHelper::map(self::find()->all(), 'id', $attributeName);
        }

        return $values;
    }

    public function getCountBooks()
    {
        /*$count = BookAuthor::find()->where(['author_id' => $this->id])->count();
        return $count;*/

        return $this->getBooks()->count();
    }

    /**
     * {@inheritdoc}
     * @return AuthorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AuthorsQuery(get_called_class());
    }

    public function getBooks()
    {
        return $this->hasMany(Books::class, ['id' => 'book_id'])
            ->viaTable(BookAuthor::tableName(), ['author_id' => 'id']);
    }

    public function beforeDelete()
    {
        //Запретить удалять автора, если он учатсвует хоть в одной книге...
        $books = BookAuthor::find()->where(['author_id' => $this->id])->all();
        if (!empty($books)) {
            Yii::$app->session->setFlash(
                'warning',
                'Нельзя удалить автора, который имеет авторство в книгах!'
            );
            return false;
        }

        return parent::beforeDelete();
    }
}
