<?php

namespace app\models\db\ar;

use app\models\User;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class GoodsHistoryOperation extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%storage_goods_history}}';
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Користувач',
            'operation' => 'Назва товару',
            'created_at' => 'Час створення',
            'updated_at' => 'Час оновлення(видалення)',
            'goods_id' => 'Назва товару'
        ];
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'goods_id', 'operation', 'updated_at', 'created_at'], 'integer'],
            [['user_id', 'goods_id', 'operation'], 'required'],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getGoods()
    {
        return $this->hasOne(Goods::className(), ['id' => 'goods_id']);
    }
}
