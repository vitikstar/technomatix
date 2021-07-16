<?php

namespace app\models\db\query;

use Yii;

class GoodsQuery extends \yii\db\ActiveQuery
{

    public static function getDb()
    {
        return Yii::$app->get('db');
    }

    public function all($db = null)
    {
        return parent::all($db);
    }

    public function one($db = null)
    {
        return parent::one($db);
    }
}
