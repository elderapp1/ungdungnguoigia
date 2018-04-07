<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Game2;

/**
 * Game2_Search represents the model behind the search form of `backend\models\Game2`.
 */
class Game2_Search extends Game2
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'correct', 'wrong'], 'integer'],
            [['true_location', 'wrong_location', 'image', 'answer', 'block', 'created_at'], 'safe'],
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
        $query = Game2::find();

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
            'correct' => $this->correct,
            'wrong' => $this->wrong,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'true_location', $this->true_location])
            ->andFilterWhere(['like', 'wrong_location', $this->wrong_location])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'answer', $this->answer])
            ->andFilterWhere(['like', 'block', $this->block]);

        return $dataProvider;
    }
}
