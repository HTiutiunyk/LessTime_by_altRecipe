<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/** @var \app\db\Projects $project */
$project = isset($project) ? $project : null;
$model = isset($model) ? $model : null;
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
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
