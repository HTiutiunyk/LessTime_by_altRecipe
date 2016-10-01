<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 10/2/16
 * Time: 2:23 AM
 */

namespace app\controllers;


use app\models\Projects;
use yii\web\Controller;

class ProjectController extends Controller
{
    public function actionIndex() {
        $projectId = \Yii::$app->request->get('id');
        $project = Projects::findOne($projectId);
        return $this->render('index', ['project' => $project]);
    }
}