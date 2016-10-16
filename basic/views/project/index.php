<?php
/** @var \app\db\Projects $project */
use app\db\Users;
use yii\bootstrap\Html;
use yii\helpers\Url;

$project = isset($project) ? $project : null;
?>

<div class="row">
    <div class="col-xs-11 col-xm-11 col-md-11 col-lg-11">
        <h1>
            <?=$project->title;?>
        </h1>
    </div>
    <div class="col-xs-1 col-xm-1 col-md-1 col-lg-1">
        <?= Html::a('', Url::to(['/project/settings', 'id' => $project->id], true),
            ['class' => 'btn btn-primary pull-right glyphicon glyphicon-cog']);?>
    </div>
</div>


<div class="row">
    <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
        <h2 class="col-md-6">Описанние проекта: <?=$project->description;?></h2>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 pull-right">
        <?= Html::a('New task', Url::to(['/task/create', 'projectId' => $project->id], true),
            ['class' => 'btn btn-primary pull-right']);?>
    </div>
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
                            <?= Html::a($task->title,
                                ['/task/view',
                                    'taskId' => $task->id,
                                    'projectId' => $project->id
                                ]);?> <span class="badge"><?=$task->priority;?></span><br>
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
                                <?= Html::a('',
                                    ['/task/edit',
                                        'taskId' => $task->id,
                                        'projectId' => $project->id
                                    ],
                                    ['class' => 'glyphicon glyphicon-pencil']);?>
                                <span><?= Users::findOne($task->user_id)->full_name;?></span>
                            </div>
                        </div>
                    </div>
                <?endforeach;?>
            </div>
        </div>
    <?php endforeach;?>
</div>