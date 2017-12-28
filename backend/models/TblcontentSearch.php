<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblcontent;

/**
 * TblcontentSearch represents the model behind the search form about `backend\models\Tblcontent`.
 */
class TblcontentSearch extends Tblcontent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'feature_id', 'group_id'], 'integer'],
            [['attribute', 'value', 'date'], 'safe'],
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
        $query = Tblcontent::find()->where(['feature_id'=> $params]);

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
            'feature_id' => $this->feature_id,
            'group_id' => $this->group_id,
        ]);

        $query->andFilterWhere(['like', 'attribute', $this->attribute])
            ->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'value', $this->date]);

        $query->groupBy(['group_id']); 

        return $dataProvider;
    }
}
