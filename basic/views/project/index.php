<?php
/** @var \app\models\Projects $project */
$project = isset($project) ? $project : null;
?>

<h1>
    <?=$project->title;?>
</h1>

<h2>
    <details>
        <summary>Описание проекта</summary>
        <?=$project->description;?>
    </details>
</h2>
<hr>

<div class="wrapper row">

</div>