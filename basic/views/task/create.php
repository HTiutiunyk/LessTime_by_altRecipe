<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<h1>New task</h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'title') ?>

<?= $form->field($model, 'description') ?>

<?= $form->field($model, 'priority') ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>