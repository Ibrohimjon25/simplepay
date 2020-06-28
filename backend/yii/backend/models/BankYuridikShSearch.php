<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BankYuridikSh;

/**
 * BankYuridikShSearch represents the model behind the search form of `app\models\BankYuridikSh`.
 */
class BankYuridikShSearch extends BankYuridikSh
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'mablag'], 'integer'],
            [['org_name', 'boss_fio', 'email', 'inn', 'passport', 'registration_date', 'hisob_raqam'], 'safe'],
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
        $query = BankYuridikSh::find();

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
            'mablag' => $this->mablag,
        ]);

        $query->andFilterWhere(['ilike', 'org_name', $this->org_name])
            ->andFilterWhere(['ilike', 'boss_fio', $this->boss_fio])
            ->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'inn', $this->inn])
            ->andFilterWhere(['ilike', 'passport', $this->passport])
            ->andFilterWhere(['ilike', 'registration_date', $this->registration_date])
            ->andFilterWhere(['ilike', 'hisob_raqam', $this->hisob_raqam]);

        return $dataProvider;
    }
}
