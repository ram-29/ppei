<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblalbumImage;

/**
 * TblalbumImageSearch represents the model behind the search form about `backend\models\TblalbumImage`.
 */
class TblalbumImageSearch extends TblalbumImage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'album_id'], 'integer'],
            [['image_name'], 'safe'],
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
        $query = TblalbumImage::find();

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
            'album_id' => $this->album_id,
        ]);

        $query->andFilterWhere(['like', 'image_name', $this->image_name]);

        return $dataProvider;
    }
}
