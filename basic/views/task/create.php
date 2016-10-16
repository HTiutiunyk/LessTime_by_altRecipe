<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$usersSelector = isset($usersSelector) ? $usersSelector : [];
$project = isset($project) ? $project : null;
?>

<h1>New task</h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'title') ?>

<?= $form->field($model, 'description')->textarea() ?>

<?= $form->field($model, 'user_id')->dropDownList($usersSelector) ?>
<div class="col-md-2 col-xs-2 col-lg-2 col-sm-4">
    <?= $form->field($model, 'priority')->input('number', ['min'=>1,'max'=>5]) ?>
</div>


    <div class="form-group">
        <?= Html::submitButton('Create task', ['class' => 'btn btn-primary']) ?>
        <?= Html::a(
            'Cancel',
            Url::to(['/project', 'id' => $project->id]),
            ['class' => 'btn btn-secondary']
        ) ?>
    </div>

<?php ActiveForm::end(); ?>