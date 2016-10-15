<?php
use yii\helpers\Html;
/** @var \app\models\TaskCreation $model */
$model = isset($model) ? $model : null;

?>
<p>Task details:</p>

<ul>
    <li><label>Title</label>: <?= Html::encode($model->title) ?></li>
    <li><label>Description</label>: <?= Html::encode($model->description) ?></li>
    <li><label>Priority</label>: <?= Html::encode($model->priority) ?></li>
</ul>