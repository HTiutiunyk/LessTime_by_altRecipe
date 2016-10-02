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
                <div class="task-list panel-body">
                    <div class="task-item well">
                        Task name <span class="badge">4</span><br>
                        Maxim Kozachenko
                    </div>
                </div>
                <div class="task-list panel-body">
                    <div class="task-item well">
                        Task name <span class="badge">4</span><br>
                        Maxim Kozachenko
                    </div>
                </div>
                <div class="task-list panel-body">
                    <div class="task-item well">
                        Task name <span class="badge">4</span><br>
                        Maxim Kozachenko
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>