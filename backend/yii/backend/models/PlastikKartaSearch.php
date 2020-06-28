<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PlastikKarta;

/**
 * PlastikKartaSearch represents the model behind the search form of `app\models\PlastikKarta`.
 */
class PlastikKartaSearch extends PlastikKarta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'bank_jism_id', 'mablag'], 'integer'],
            [['olingan_sana'], 'safe'],
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
        $query = PlastikKarta::find();

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
            'bank_jism_id' => $this->bank_jism_id,
            'mablag' => $this->mablag,
        ]);

        $query->andFilterWhere(['ilike', 'olingan_sana', $this->olingan_sana]);

        return $dataProvider;
    }
}
