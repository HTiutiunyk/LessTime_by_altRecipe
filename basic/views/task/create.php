<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<h1>New task</h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'title') ?>

<?= $form->field($model, 'description')->textarea() ?>
<div class="col-md-2 col-xs-2 col-lg-2 col-sm-4">
    <?= $form->field($model, 'priority')->input('number', ['min'=>1,'max'=>5]) ?>
</div>


    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>