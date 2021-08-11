<?php

namespace frontend\modules\library\models\AuthorBook;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\library\models\AuthorBook\AuthorBook;

/**
 * AuthorBookSearch represents the model behind the search form of `frontend\modules\library\models\AuthorBook\AuthorBook`.
 */
class AuthorBookSearch extends AuthorBook
{
    public $authorName;
    public $bookName;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'author_id', 'book_id'], 'integer'],
            [['authorName', 'bookName'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AuthorBook::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->innerJoin('book', 'book.id = author_book.book_id');
        $query->innerJoin('author', 'author.id = author_book.author_id');

        $dataProvider->setSort([
            'defaultOrder' => [
                'authorName' => SORT_ASC
            ],
            'attributes' => [
                'author_id',
                'book_id',
                'authorName' => [
                    'asc' => ['author.name' => SORT_ASC],
                    'desc' => ['author.name' => SORT_DESC],
                ],
                'bookName' => [
                    'asc' => ['book.name' => SORT_ASC],
                    'desc' => ['book.name' => SORT_DESC],
                ],



            ]
        ]);

        $query->andFilterWhere([
            'author_book.id' => $this->id,
            'author_book.author_id' => $this->author_id,
            'author_book.book_id' => $this->book_id,
        ]);


        $query->andFilterWhere([
            'LIKE', 'author.name', $this->authorName,
        ]);
        $query->andFilterWhere([
            'LIKE', 'book.name', $this->bookName,
        ]);


        return $dataProvider;
    }
}
