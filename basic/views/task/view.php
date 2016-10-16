<?php
use app\db\Users;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var \app\db\Tasks $task */
$task = isset($task) ? $task: null;
/** @var \app\db\Projects $project */
$project = isset($project) ? $project : null;
$usersSelector = isset($usersSelector) ? $usersSelector : [];
?>


<div class="wrapper col-lg-5 col-xs-12 col-md-5 col-sm-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="panel-title" style="display: inline-block"><?= $task->title ?></h2>
            <span class="badge"><?=$task->priority;?></span>
        </div>
        <div class="panel-body">
            <span><?= $task->description ?></span>
            <div class="well well-sm">
                <p>Assign to: <?=Users::findOne($task->user_id)->full_name;?></p>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <span class="panel-title">Attachments</span>
                </div>
            </div>
            <div class="panel-body">
                <ul>
                    <li>Attachment</li>
                    <li>Attachment</li>
                    <li>Attachment</li>
                    <li>Attachment</li>
                </ul>
            </div>
            <?= Html::a(
                'Close task',
                Url::to(['/project', 'id' => $project->id]),
                ['class' => 'btn btn-primary']
            ) ?>
        </div>
    </div>
</div>


<div class="wrapper col-lg-7 col-xs-12 col-md-7 col-sm-6">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Comments</h3>
        </div>
        <div class="panel-body">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <span class="panel-title">F.name s.name</span>
                </div>
                <div class="panel-body">
                    <p>This is horosho</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae corporis cupiditate earum expedita facilis hic ipsa labore modi molestias nostrum perspiciatis, quidem quod repellat sequi sit temporibus, unde vel veniam?</p>
                </div>
            </div>
        </div>
    </div>
</div>

