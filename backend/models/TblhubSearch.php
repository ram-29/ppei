<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblhub;

/**
 * TblhubSearch represents the model behind the search form about `backend\models\Tblhub`.
 */
class TblhubSearch extends Tblhub
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'phase_id', 'hcategory_id', 'resource_id'], 'integer'],
            [['file_name', 'status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Tblhub::find();

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
            'phase_id' => $this->phase_id,
            'hcategory_id' => $this->hcategory_id,
            'resource_id' => $this->resource_id,
        ]);

        $query->andFilterWhere(['like', 'file_name', $this->file_name])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
