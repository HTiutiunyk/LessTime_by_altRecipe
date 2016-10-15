<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 10/2/16
 * Time: 2:23 AM
 */

namespace app\controllers;


use app\db\Projects;
use app\db\Stages;
use app\db\Tasks;
use app\models\TaskCreation;
use app\models\TaskEditing;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;

class TaskController extends Controller
{
    public function actionIndex() {
        return true;
    }

    public function actionCreate() {
        $model = new TaskCreation();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $task = new Tasks();
            $projectId = \Yii::$app->request->get('projectId');

            $firstStage = Stages::find()
                ->where(['project_id' => $projectId])
                ->orderBy('order')
                ->all()[0];

            $task->stage_id = $firstStage->id;
            $task->title = $model->title;
            $task->description = $model->description;
            $task->priority = $model->priority;

            if ($task->save()) {
                return $this->redirect(['/project', 'id' => $projectId]);
            } else {
                return $this->render('create-confirm', ['model' => $model]);
            }
        } else {
            // render page first time, or display errors
            return $this->render('create', ['model' => $model]);
        }
    }

    public function actionNext() {
        /** @var Tasks $currentTask */
        $currentTask = Tasks::findOne(\Yii::$app->request->get('taskId'));
        $projectId = \Yii::$app->request->get('projectId');
        $currentStage = Stages::findOne($currentTask->stage_id);

        $nextStage = Stages::findOne([
            'order' => $currentStage->order + 1,
            'project_id' => $currentStage->project_id
        ]);

        if ($nextStage != null) {
            $currentTask->stage_id = $nextStage->id;
        }
        $currentTask->save();

        return $this->redirect(['/project', 'id' => $projectId]);
    }

    public function actionPrev() {
        /** @var Tasks $currentTask */
        $currentTask = Tasks::findOne(\Yii::$app->request->get('taskId'));
        $projectId = \Yii::$app->request->get('projectId');
        $currentStage = Stages::findOne($currentTask->stage_id);

        $prevStage = Stages::findOne([
            'order' => $currentStage->order - 1,
            'project_id' => $currentStage->project_id
        ]);

        if ($prevStage != null) {
            $currentTask->stage_id = $prevStage->id;
        }
        $currentTask->save();

        return $this->redirect(['/project', 'id' => $projectId]);
    }

    public function actionDelete() {
        /** @var Tasks $currentTask */
        $currentTask = Tasks::findOne(\Yii::$app->request->get('taskId'));
        $projectId = \Yii::$app->request->get('projectId');
        $currentTask->delete();
        return $this->redirect(['/project', 'id' => $projectId]);
    }

    public function actionEdit() {
        /** @var Tasks $currentTask */
        $currentTask = Tasks::findOne(\Yii::$app->request->get('taskId'));
        $project = Projects::findOne(\Yii::$app->request->get('projectId'));

        $model = new TaskEditing();
        foreach ($model as $key => $value) {
            $model->$key = $currentTask->$key;
        }


        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            foreach ($model as $key => $value) {
                $currentTask->$key = $model->$key;
            }

            if ($currentTask->save()) {
                return $this->redirect(['/project', 'id' => $project->id]);
            } else {
                throw new HttpException(
                    "Something went wrong. You shouldn't see this error at all"
                );
            }
        } else {
            // render page first time, or display errors
            return $this->render('editing', ['task' => $model, 'project' => $project]);
        }
    }
}