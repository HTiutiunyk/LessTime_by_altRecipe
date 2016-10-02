<?php
/** @var \app\db\Projects $project */
$project = isset($project) ? $project : null;
?>

<h1>
    <?=$project->title;?>
</h1>

<details>
    <summary>Описание проекта</summary>
    <?=$project->description;?>
</details>
<hr>

<div class="wrapper row">
    <div class="col-md-2 panel panel-primary">
        <div class="panel-heading">
            <h3>Project stage</h3>
        </div>
        <hr>
        <div class="task-list panel-body">
            <div class="task-item panel">
                Task name <span class="badge">4</span><br>
                Maxim Kozachenko
            </div>
        </div>
    </div>
</div>