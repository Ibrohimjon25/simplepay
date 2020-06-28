<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransactionKarta;

/**
 * TransactionKartaSearch represents the model behind the search form of `app\models\TransactionKarta`.
 */
class TransactionKartaSearch extends TransactionKarta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'summa'], 'integer'],
            [['sender_karta_num', 'receiver_karta_num', 'date'], 'safe'],
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
        $query = TransactionKarta::find();

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
            'summa' => $this->summa,
        ]);

        $query->andFilterWhere(['ilike', 'sender_karta_num', $this->sender_karta_num])
            ->andFilterWhere(['ilike', 'receiver_karta_num', $this->receiver_karta_num])
            ->andFilterWhere(['ilike', 'date', $this->date]);

        return $dataProvider;
    }
}
