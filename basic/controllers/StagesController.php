<?php
namespace app\controllers;


use app\db\Projects;
use app\db\Stages;
use app\models\StagesView;
use app\services\LogUtils;
use Yii;
use yii\base\UserException;
use yii\web\Controller;
use yii\web\HttpException;

class StagesController extends Controller {
    public function actionView() {
        $model = new StagesView(Stages::findOne(\Yii::$app->request->get('id')));
        $project = Projects::findOne(Yii::$app->request->get('projectId'));

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $stage = Stages::findOne($model->id);

            foreach ($model as $key => $value) {
                $stage->$key = $value;
            }

            if ($stage->save()) {
                return $this->redirect(['/project/settings', 'id' => $project->id]);
            } else {
                throw new HttpException(
                    "Something went wrong. You shouldn't see this error at all"
                );
            }
        } else {
            // render page first time, or display errors
            return $this->render('view', ['model' => $model]);
        }
    }

    public function actionCreate() {
        $model = new StagesView(Stages::findOne(\Yii::$app->request->get('id')));
        $project = Projects::findOne(Yii::$app->request->get('projectId'));

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $stage = new Stages();
            $stage->project_id = $project->id;
            $stage->title = $model->title;
            $stage->description = $model->description;
            /** @var Stages $lastStage */
            $lastStage = Stages::find()
                ->where(['project_id' => $project->id])
                ->orderBy('order DESC')
                ->all()[0];

            $stage->order = $lastStage->order + 1;
            LogUtils::info($stage, "STAGE");

            if ($stage->save()) {
                return $this->redirect(['/project/settings', 'id' => $project->id]);
            } else {
                LogUtils::info($stage, "STAGE");
                throw new UserException(
                    "Something went wrong. You shouldn't see this error at all"
                );
            }
        } else {
            // render page first time, or display errors
            return $this->render('view', ['model' => $model]);
        }
    }

    public function actionDelete() {
        /** @var Stages $stage */
        $stage = Stages::findOne(\Yii::$app->request->get('id'));
        $project = Projects::findOne(Yii::$app->request->get('projectId'));

        if (count($stage->tasks)) {
            throw new UserException("You cant delete stage, while it have tasks in it.");
        }

        $stageOrder = $stage->order;
        if ($stage->delete()) {
            /** @var Stages[] $stagesToMove */
            $stagesToMove = Stages::find()
                ->where("`order` > '$stageOrder'")
                ->all();
            foreach ($stagesToMove as $st) {
                $st->order = $st->order - 1;
                $st->save();
            }
            return $this->redirect(['/project/settings', 'id' => $project->id]);
        }
    }
}