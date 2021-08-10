<?php

namespace frontend\modules\library\models\AuthorBook;

use Yii;
use frontend\modules\library\models\Author\Author;
use frontend\modules\library\models\Book\Book;
/**
 * This is the model class for table "author_book".
 *
 * @property int $id
 * @property int|null $author_id
 * @property int|null $book_id
 *
 * @property Author $author
 * @property Book $book
 */
class AuthorBook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author_book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'book_id'], 'integer'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'author_id' => Yii::t('app', 'Author ID'),
            'book_id' => Yii::t('app', 'Book ID'),
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }
}
