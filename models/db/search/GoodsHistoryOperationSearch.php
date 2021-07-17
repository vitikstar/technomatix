<?php

namespace app\models\db\search;

use app\models\db\ar\GoodsHistoryOperation;
use kartik\daterange\DateRangeBehavior;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use Yii;

class GoodsHistoryOperationSearch extends GoodsHistoryOperation
{
    /**
     * {@inheritdoc}
     */

    public $createTimeStart;
    public $createTimeEnd;


    public function rules()
    {
        return [
            [['user_id', 'goods_id', 'operation', 'updated_at', 'created_at'], 'safe'],
            [['user_id', 'goods_id'], 'integer'],
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
        $query = GoodsHistoryOperation::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $this->updated_at = $params['updated_at'];

        $arr_time = explode(" - ", $this->updated_at);
        $this->createTimeStart = strtotime(trim($arr_time[0]));
        $this->createTimeEnd = strtotime(trim($arr_time[1]));
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'operation' => $this->operation,
        ]);

        if ($this->user_id)
            $query->andFilterWhere([
                'user_id' => $this->user_id
            ]);
        if ($this->user_id)
            $query->andFilterWhere([
                'goods_id' => $this->goods_id
            ]);

        // Agregar condicion de rango de fechas 
        $query->andFilterWhere(['>=', 'updated_at', $this->createTimeStart])
            ->andFilterWhere(['<', 'updated_at', $this->createTimeEnd]);

        return $dataProvider;
    }
}
