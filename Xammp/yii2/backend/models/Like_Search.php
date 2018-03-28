<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Likeinfo;

/**
 * Like_Search represents the model behind the search form of `app\models\Likeinfo`.
 */
class Like_Search extends Likeinfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_newfeed', 'id_user'], 'integer'],
            [['created_at'], 'safe'],
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
        $query = Likeinfo::find();

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

        return $dataProvider;
    }
}
