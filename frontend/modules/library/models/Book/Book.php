<?php

namespace frontend\modules\library\models\Book;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $price
 * @property string|null $publisDate
 *
 * @property AuthorBook[] $authorBooks
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'integer'],
            [['publisDate'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'price' => Yii::t('app', 'Price'),
            'publisDate' => Yii::t('app', 'Publis Date'),
        ];
    }

    /**
     * Gets query for [[AuthorBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthorBooks()
    {
        return $this->hasMany(AuthorBook::className(), ['book_id' => 'id']);
    }
}
