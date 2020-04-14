<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Book;

/**
 * BookSearch represents the model behind the search form of `app\models\Book`.
 */
class BookSearch extends Book
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'certificator_id', 'publisher_id', 'sales', 'show_counter', 'price', 'old_price', 'arenda', 'like_counter', 'page_size', 'status', 'is_delete', 'user_id'], 'integer'],
            [['alias', 'name', 'certificate', 'year', 'made_in', 'authors', 'code', 'shtrix_code', 'isbn_code', 'made_date', 'detail', 'size', 'muqova', 'created', 'updated', 'genres', 'subject', 'image'], 'safe'],
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
        $query = Book::find()->where(['>','status',-1]);
        if(\Yii::$app->user->identity->role->role!='Admin')
            $query = Book::find()->where(['>','status',-1])->andWhere(['user_id'=>\Yii::$app->user->id]);

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
            'certificator_id' => $this->certificator_id,
            'year' => $this->year,
            'made_in' => $this->made_in,
            'publisher_id' => $this->publisher_id,
            'sales' => $this->sales,
            'show_counter' => $this->show_counter,
            'price' => $this->price,
            'old_price' => $this->old_price,
            'arenda' => $this->arenda,
            'made_date' => $this->made_date,
            'like_counter' => $this->like_counter,
            'page_size' => $this->page_size,
            'status' => $this->status,
            'is_delete' => $this->is_delete,
            'created' => $this->created,
            'updated' => $this->updated,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'certificate', $this->certificate])
            ->andFilterWhere(['like', 'authors', $this->authors])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'shtrix_code', $this->shtrix_code])
            ->andFilterWhere(['like', 'isbn_code', $this->isbn_code])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'size', $this->size])
            ->andFilterWhere(['like', 'muqova', $this->muqova])
            ->andFilterWhere(['like', 'genres', $this->genres])
            ->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
