<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BankJismSh;

/**
 * BankJismShSearch represents the model behind the search form of `app\models\BankJismSh`.
 */
class BankJismShSearch extends BankJismSh
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['org_name', 'firstname', 'lastname', 'father_name', 'email', 'inn', 'passport', 'propiska', 'registration_date'], 'safe'],
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
        $query = BankJismSh::find();

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
        ]);

        $query->andFilterWhere(['ilike', 'org_name', $this->org_name])
            ->andFilterWhere(['ilike', 'firstname', $this->firstname])
            ->andFilterWhere(['ilike', 'lastname', $this->lastname])
            ->andFilterWhere(['ilike', 'father_name', $this->father_name])
            ->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'inn', $this->inn])
            ->andFilterWhere(['ilike', 'passport', $this->passport])
            ->andFilterWhere(['ilike', 'propiska', $this->propiska])
            ->andFilterWhere(['ilike', 'registration_date', $this->registration_date]);

        return $dataProvider;
    }
}
