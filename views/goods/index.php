<?php

use app\models\db\ar\Goods;
use kartik\grid\GridView;
use mdm\admin\components\Helper;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\GrupaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список товарів';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="asu-grupa-index">
    <p>
        <?= Html::a('Додати товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'title',
                'label' => 'Назва',
                'format' => 'text', // Возможные варианты: raw, html
                'content' => function ($data) {
                    return (isset($data->title)) ? $data->title : 'Пусто';
                },
                'filter' => [0 => 'Оберіть'] + ArrayHelper::map(Goods::find()->all(), 'id', 'title'),
            ],
            'remainder',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => Helper::filterActionColumn('{update}{delete}'),
            ],
        ]
    ]); ?>

    <?php Pjax::end(); ?>

</div>