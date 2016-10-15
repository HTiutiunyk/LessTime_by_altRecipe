<?php
use app\db\Projects;
use app\db\ProjectUsers;
use app\db\Users;
use app\services\UserUtils;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/** @var Projects $project */
$project = isset($project) ? $project : null;
$model = isset($model) ? $model : null;
/** @var Users[] $projectManagers */
$projectManagers = isset($projectManagers) ? $projectManagers : null;
$toPmSelector = UserUtils::usersToSelector($projectManagers, "Select project manager");

/** @var ProjectUsers[] $projectEmployees */
$projectEmployees = ProjectUsers::find()->where(['project_id' => $project->id, 'is_pm' => 0])->all();
/** @var Users[] $projectManagers */
$employees = isset($employees) ? $employees : [];
$toEmployeesSelector = UserUtils::usersToSelector($employees, "Select employee");
?>

<h1>Project settings</h1>
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Project details</h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'title') ?>

                <?= $form->field($model, 'description')->textarea() ?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Roles</h3>
            </div>
            <div class="panel-body">
                <form method="post" action="<?= Url::to(['/project/update-project-roles']);?>">
                    <label class="control-label col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        PM:
                        <?=Html::dropDownList('pm', $project->getPm()->id, $toPmSelector,
                            ['class' => 'form-control col-xs-12 col-sm-12 col-md-12 col-lg-12']
                        );?>
                    </label>
                    <div class="row">
                        <label class="control-label col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            Employees:
                            <?= Html::a('',
                                ['/project/add-employee'],
                                ['class' => 'glyphicon glyphicon-plus']
                            );?>
                        </label>
                    </div>
                    <?php foreach ($projectEmployees as $pe):?>
                    <label class="control-label col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <?=Html::dropDownList('pe--'.$pe->id, $pe->user_id, $toEmployeesSelector,
                            ['class' => 'form-control col-xs-12 col-sm-12 col-md-12 col-lg-12']
                        );?>
                        <?= Html::a('',
                            ['/project/remove-employee','puId' => $pe->id],
                            ['class' => 'glyphicon glyphicon-trash']
                        );?>
                    </label>
                    <?php endforeach;?>
                    <input type="submit" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Stages</h3>
                <?= Html::a('',
                    ['/stages/create',
                        'projectId' => $project->id],
                    ['class' => 'btn btn-success glyphicon glyphicon-plus']
                ) ;?>
            </div>
            <div class="panel-body">
                <?php foreach ($project->stages as $stage): ?>
                    <div class="well">
                        <div class="row">
                            <strong><?=$stage->title;?></strong>
                        </div>
                        <div class="row">
                            <span><?=$stage->description;?></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <?= Html::a('',
                                ['/stages/view',
                                        'id' => $stage->id,
                                        'projectId' => $project->id],
                                ['class' => 'glyphicon glyphicon-pencil']
                                ) ;?>
                                <?= Html::a('',
                                    ['/stages/delete',
                                        'id' => $stage->id,
                                        'projectId' => $project->id],
                                    ['class' => 'glyphicon glyphicon-trash']
                                ) ;?>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
