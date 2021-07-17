<?php

use app\models\db\ar\Goods;
use app\models\GoodsHistoryOperation;
use app\models\User;
use kartik\grid\GridView;
use mdm\admin\components\Helper;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = 'Список операцій над товаром';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="operation-index">
    <?php Pjax::begin() ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'user_id',
                'format' => 'text', // Возможные варианты: raw, html
                'content' => function ($data) {
                    return (isset($data->user->username)) ? $data->user->username : 'Пусто';
                },
                'filter' => [0 => 'Оберіть'] + ArrayHelper::map(User::find()->all(), 'id', 'username'),
                'filterType' => GridView::FILTER_SELECT2,
            ],
            [
                'attribute' => 'goods_id',
                'format' => 'text', // Возможные варианты: raw, html
                'content' => function ($data) {
                    return (isset($data->goods->title)) ? $data->goods->title : 'Пусто';
                },
                'filter' => [0 => 'Оберіть'] + ArrayHelper::map(Goods::find()->all(), 'id', 'title'),
                'filterType' => GridView::FILTER_SELECT2,
            ],
            [
                'attribute' => 'operation',
                'label' => 'Операція',
                'content' => function ($data) {
                    $operation = GoodsHistoryOperation::getOperation();
                    return $operation[$data->operation];
                },
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'operation',
                    GoodsHistoryOperation::getOperation(),
                    ['class' => 'form-control', 'prompt' => 'Всі']
                )
            ],
            [
                'attribute' => 'updated_at',
                'content' => function ($data) {
                    return Yii::$app->formatter->asDatetime($data->updated_at, "long");
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => Helper::filterActionColumn('{delete}'),
            ],
        ]
    ]); ?>

    <?php Pjax::end(); ?>

</div>