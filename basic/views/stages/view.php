<?php
/** @var \app\models\StagesView $model */
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

$model = isset($model) ? $model : null;
?>
<h1>Stage</h1>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'title') ?>

<?= $form->field($model, 'description')->textarea() ?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

