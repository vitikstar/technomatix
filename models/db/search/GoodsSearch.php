<?php

namespace app\models\db\search;

use app\models\db\ar\Goods;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use Yii;

class GoodsSearch extends Goods
{
    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['id', 'create_user_id'], 'integer'],
            [['title', 'remainder'], 'safe'],
        ];
    }
    public static function getDb()
    {
        return Yii::$app->get('db');
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
        $query = Goods::find();

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
            'create_user_id' => $this->create_user_id
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
