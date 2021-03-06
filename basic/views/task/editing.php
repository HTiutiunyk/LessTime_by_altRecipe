<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var \app\db\Tasks $task */
$task = isset($task) ? $task: null;
/** @var \app\db\Projects $project */
$project = isset($project) ? $project : null;

$usersSelector = isset($usersSelector) ? $usersSelector : [];
?>

    <h1>Edit task <?= $task->title ?></h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($task, 'title') ?>

<?= $form->field($task, 'description')->textarea() ?>

<?= $form->field($task, 'user_id')->dropDownList($usersSelector) ?>
<div class="col-md-2 col-xs-2 col-lg-2 col-sm-4">
    <?= $form->field($task, 'priority')->input('number', ['min'=>1,'max'=>5]) ?>
</div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
        <?= Html::a(
            'Dismiss changes',
            Url::to(['/project', 'id' => $project->id]),
            ['class' => 'btn btn-secondary']
        ) ?>
    </div>

<?php ActiveForm::end(); ?>