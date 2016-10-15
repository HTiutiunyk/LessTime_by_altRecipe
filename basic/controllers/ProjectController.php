<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 10/2/16
 * Time: 2:23 AM
 */

namespace app\controllers;


use app\db\Projects;
use app\db\ProjectUsers;
use app\db\Roles;
use app\models\ProjectEdit;
use app\services\UserUtils;
use Yii;
use yii\base\UserException;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

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
        $projectManagers = Roles::findOne(['system_tag' => UserUtils::ROLE_PM])->getUsers();
        $employees = Roles::findOne(['system_tag' => UserUtils::ROLE_EMPLOYEE])->getUsers();
        foreach ($model as $key => $value) {
            $model->$key = $project->$key;
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            foreach ($model as $key => $value) {
                $project->$key = $model->$key;
            }

            if ($project->save()) {
                return $this->render('settings', [
                    'model' => $model,
                    'project' => $project,
                    'projectManagers' => $projectManagers,
                    'employees' => $employees
                ]);
            } else {
                throw new UserException(
                    "Something went wrong. You shouldn't see this error at all"
                );
            }
        } else {
            // render page first time, or display errors
            return $this->render('settings', [
                'model' => $model,
                'project' => $project,
                'projectManagers' => $projectManagers,
                'employees' => $employees
            ]);
        }
    }

    public function actionUpdateProjectRoles() {
        $dataWeGot = Yii::$app->request->post();

        foreach ($dataWeGot as $key => $value) {
            $exploded = explode("--", $key);
            if ($exploded[0] == "pe") {
                $pe = ProjectUsers::findOne($exploded[1]);
                $pe->user_id = $value;
                $pe->save();
            } elseif ($exploded[0] == "pm") {
                $pm = ProjectUsers::findOne([
                    'project_id' => Yii::$app->session->get('currentProject')->id,
                    'is_pm' => 1
                ]);
                $pm->user_id = $value;
                $pm->save();
            }
        }
        return $this->redirect(['/project/settings',
            'id' => Yii::$app->session->get('currentProject')->id]);
    }

    public function actionAddEmployee() {
        $pe = new ProjectUsers();
        $pe->project_id = Yii::$app->session->get('currentProject')->id;
        $pe->is_pm = 0;
        $pe->user_id = 0;
        $pe->save();
        return $this->redirect(['/project/settings',
            'id' => Yii::$app->session->get('currentProject')->id]);
    }

    public function actionRemoveEmployee() {
        $pe = ProjectUsers::findOne(Yii::$app->request->get('puId'));
        $pe->delete();
        return $this->redirect(['/project/settings',
            'id' => Yii::$app->session->get('currentProject')->id]);
    }

    private function getProjectFromRequest($type='get') {
        $projectId = $type == 'get' ? \Yii::$app->request->get('id') :
            \Yii::$app->request->post('id');
        Yii::$app->session->set('currentProject', Projects::findOne($projectId));
        return Projects::findOne($projectId);
    }
}