<?php
namespace app\controllers;


use app\db\Projects;
use app\db\Stages;
use app\models\StagesView;
use Yii;
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
}