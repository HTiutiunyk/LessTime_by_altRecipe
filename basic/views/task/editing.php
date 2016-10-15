<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var \app\db\Tasks $task */
$task = isset($task) ? $task: null;
/** @var \app\db\Projects $project */
$project = isset($project) ? $project : null;
?>

    <h1>Edit task <?= $task->title ?></h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'title') ?>

<?= $form->field($model, 'description') ?>

<?= $form->field($model, 'priority') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
        <?= Html::a(
            'Dismiss changes',
            Url::to(['project', 'projectId' => $project->id], true),
            ['class' => 'btn btn-secondary']
        ) ?>
    </div>

<?php ActiveForm::end(); ?>