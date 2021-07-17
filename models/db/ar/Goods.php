<?php

namespace app\models\db\ar;

use app\models\db\ar\GoodsHistoryOperation as ArGoodsHistoryOperation;
use app\models\db\query\GoodsQuery;
use app\models\GoodsHistoryOperation;
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
    public function afterDelete()
    {
        parent::afterDelete();
        $operation = new ArGoodsHistoryOperation();
        $operation->user_id = Yii::$app->user->id;
        $operation->goods_id = $this->id;
        $operation->operation = GoodsHistoryOperation::OPERATION_DELETED;
        $operation->updated_at = time();
        $operation->save(false);
    }
    public function afterSave($insert, $changedAttributes)
    {
        $operation = new ArGoodsHistoryOperation();
        $operation->user_id = Yii::$app->user->id;
        $operation->goods_id = $this->id;
        $operation->operation = GoodsHistoryOperation::OPERATION_CREATE;
        $operation->updated_at = time();
        $operation->created_at = time();
        $operation->save(false);
        parent::afterSave($insert, $changedAttributes);
        Yii::$app->session->setFlash('success', 'Запись сохранена');
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
