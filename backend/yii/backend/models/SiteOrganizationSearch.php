<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SiteOrganization;

/**
 * SiteOrganizationSearch represents the model behind the search form of `app\models\SiteOrganization`.
 */
class SiteOrganizationSearch extends SiteOrganization
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'yuridik_id'], 'integer'],
            [['org_name', 'email', 'hisob_raqam', 'service_name', 'description', 'service_img'], 'safe'],
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
        $query = SiteOrganization::find();

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
            'category_id' => $this->category_id,
            'yuridik_id' => $this->yuridik_id,
        ]);

        $query->andFilterWhere(['ilike', 'org_name', $this->org_name])
            ->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'hisob_raqam', $this->hisob_raqam])
            ->andFilterWhere(['ilike', 'service_name', $this->service_name])
            ->andFilterWhere(['ilike', 'description', $this->description])
            ->andFilterWhere(['ilike', 'service_img', $this->service_img]);

        return $dataProvider;
    }
}
