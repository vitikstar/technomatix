<?php

namespace app\models\db\ar;

use app\models\db\query\GoodsQuery;
use app\models\User;
use Yii;

class Goods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'storage_goods_list';
    }
    public static function getDb()
    {
        return Yii::$app->get('db');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_user_id'], 'integer'],
            [['title', 'create_user_id', 'remainder'], 'required'],
            [['title'], 'string', 'max' => 45],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Назва товару',
            'remainder' => 'Залишок'
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'create_user_id']);
    }

    public static function find()
    {
        return new GoodsQuery(get_called_class());
    }
}
