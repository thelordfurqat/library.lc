<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Library;

/**
 * LibrarySearch represents the model behind the search form of `app\models\Library`.
 */
class LibrarySearch extends Library
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'bank_id', 'country_id', 'region_id', 'district_id', 'status', 'instagram'], 'integer'],
            [['code', 'name', 'bank_account_number', 'oked', 'inn', 'address', 'phone', 'fax', 'telegram_channel', 'chat_id', 'director', 'buxgalter', 'email', 'created', 'updated', 'setting', 'image', 'telegram_username'], 'safe'],
            [['balans'], 'number'],
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
        $query = Library::find()->where(['>','status',0]);

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
            'bank_id' => $this->bank_id,
            'country_id' => $this->country_id,
            'region_id' => $this->region_id,
            'district_id' => $this->district_id,
            'created' => $this->created,
            'updated' => $this->updated,
            'status' => $this->status,
            'balans' => $this->balans,
            'instagram' => $this->instagram,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'bank_account_number', $this->bank_account_number])
            ->andFilterWhere(['like', 'oked', $this->oked])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'telegram_channel', $this->telegram_channel])
            ->andFilterWhere(['like', 'chat_id', $this->chat_id])
            ->andFilterWhere(['like', 'director', $this->director])
            ->andFilterWhere(['like', 'buxgalter', $this->buxgalter])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'setting', $this->setting])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'telegram_username', $this->telegram_username]);

        return $dataProvider;
    }
}
