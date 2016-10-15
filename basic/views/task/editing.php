<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var \app\db\Tasks $task */
$task = isset($task) ? $task: null;
/** @var \app\db\Projects $project */
$project = isset($project) ? $project : null;

\app\services\LogUtils::info([$task, $project] , "kazak");
?>

    <h1>Edit task <?= $task->title ?></h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($task, 'title') ?>

<?= $form->field($task, 'description')->textarea() ?>
<div class="col-md-2 col-xs-2 col-lg-2 col-sm-4">
    <?= $form->field($task, 'priority')->input('number') ?>
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