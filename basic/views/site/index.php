<?php
/** @var \app\db\Projects[] $projects */
$projects = isset($projects) ? $projects : null;

/* @var $this yii\web\View */
$this->title = 'Dashboard';

?>
<div class="site-index">
    <?php foreach ($projects as $project):?>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <a href="<?= \yii\helpers\Url::to(['/project', 'id' => $project->id]) ?>">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong><?= $project->title ;?></strong>
                    </div>
                    <div class="panel-body">
                        <p><?= $project->description; ?></p>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach;?>
</div>
