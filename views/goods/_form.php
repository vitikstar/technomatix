<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-10"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>
    <div class="col-md-2"><?= $form->field($model, 'remainder')->input(['type' => 'number']) ?></div>
    <?= $form->field($model, 'create_user_id')->hiddenInput()->label('') ?>
    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>