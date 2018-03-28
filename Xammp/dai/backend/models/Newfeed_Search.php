<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Newfeed;

/**
 * Newfeed_Search represents the model behind the search form of `app\models\Newfeed`.
 */
class Newfeed_Search extends Newfeed
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_newfeed', 'id_user'], 'integer'],
            [['status', 'image', 'block', 'created_at'], 'safe'],
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
        $query = Newfeed::find();

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
            'id_newfeed' => $this->id_newfeed,
            'id_user' => $this->id_user,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'block', $this->block]);

        return $dataProvider;
    }
}