<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Game1;

/**
 * Game1_Search represents the model behind the search form of `app\models\Game1`.
 */
class Game1_Search extends Game1
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_question', 'id_user', 'correct', 'wrong'], 'integer'],
            [['status', 'image', 'A', 'B', 'C', 'D', 'answer', 'block', 'created_at'], 'safe'],
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
        $query = Game1::find();

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
            'id_question' => $this->id_question,
            'id_user' => $this->id_user,
            'correct' => $this->correct,
            'wrong' => $this->wrong,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'A', $this->A])
            ->andFilterWhere(['like', 'B', $this->B])
            ->andFilterWhere(['like', 'C', $this->C])
            ->andFilterWhere(['like', 'D', $this->D])
            ->andFilterWhere(['like', 'answer', $this->answer])
            ->andFilterWhere(['like', 'block', $this->block]);

        return $dataProvider;
    }
}
