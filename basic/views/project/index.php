<?php
/** @var \app\db\Projects $project */
use yii\bootstrap\Html;
use yii\helpers\Url;

$project = isset($project) ? $project : null;
?>

<h1>
    <?=$project->title;?>
</h1>

<div class="row">
    <h2 class="col-md-6">Описанние проекта: <?=$project->description;?></h2>

    <?= Html::a('New task', Url::to(['/task/create', 'projectId' => $project->id], true),
        ['class' => 'btn btn-primary']);?>
<!--    <a class="btn btn-primary col-md-1" >New task</a>-->
</div>

<hr>

<div class="wrapper row">
    <?php foreach ($project->stages as $stage):?>
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3><?=$stage->title;?></h3>
                </div>
                <?php foreach ($stage->tasks as $task): ?>
                    <div class="task-list panel-body">
                        <div class="task-item well">
                            <?=$task->title;?> <span class="badge"><?=$task->priority;?></span><br>
                            <div class="row">
                                <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                                    <?= Html::a('',
                                        ['/task/prev',
                                            'taskId' => $task->id,
                                            'projectId' => $project->id
                                        ],
                                        ['class' => 'glyphicon glyphicon-arrow-left']);?>
                                </div>
                                <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6" style="float: right">
                                    <?= Html::a('',
                                        ['/task/next',
                                            'taskId' => $task->id,
                                            'projectId' => $project->id
                                        ],
                                        ['class' => 'glyphicon glyphicon-arrow-right']);?>
                                </div>
                            </div>
                            <div class="row">
                                <?= Html::a('',
                                    ['/task/delete',
                                        'taskId' => $task->id,
                                        'projectId' => $project->id
                                    ],
                                    ['class' => 'glyphicon glyphicon-trash']);?>
                            </div>
                        </div>
                    </div>
                <?endforeach;?>
            </div>
        </div>
    <?php endforeach;?>
</div>