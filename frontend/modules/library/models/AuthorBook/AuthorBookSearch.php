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
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'author_id', 'book_id'], 'integer'],
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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'author_id' => $this->author_id,
            'book_id' => $this->book_id,
        ]);

        return $dataProvider;
    }
}
