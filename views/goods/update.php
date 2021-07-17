<?php


$this->title = 'Оновлення товару: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Список товарів', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Оновлення';
?>
<div class="goods-update">

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>