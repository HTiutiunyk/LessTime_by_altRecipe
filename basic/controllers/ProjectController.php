<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 10/2/16
 * Time: 2:23 AM
 */

namespace app\controllers;


use app\db\Projects;
use app\models\ProjectEdit;
use Yii;
use yii\base\UserException;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\HttpException;

class ProjectController extends Controller
{
    public function beforeAction($action) {
        if (\Yii::$app->user->isGuest) {
            throw new ForbiddenHttpException("No way to go here without authorisation");
        } else {
            return true;
        }
    }

    public function actionIndex() {
        return $this->render('index', ['project' => $this->getProjectFromRequest()]);
    }

    public function actionSettings() {
        $model = new ProjectEdit();
        $project = $this->getProjectFromRequest();
        foreach ($model as $key => $value) {
            $model->$key = $project->$key;
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            foreach ($model as $key => $value) {
                $project->$key = $model->$key;
            }

            if ($project->save()) {
                return $this->render('settings', ['model' => $model, 'project' => $project]);
            } else {
                throw new UserException(
                    "Something went wrong. You shouldn't see this error at all"
                );
            }
        } else {
            // render page first time, or display errors
            return $this->render('settings', ['model' => $model, 'project' => $project]);
        }
    }

    private function getProjectFromRequest($type='get') {
        $projectId = $type == 'get' ? \Yii::$app->request->get('id') :
            \Yii::$app->request->post('id');
        return Projects::findOne($projectId);
    }
}