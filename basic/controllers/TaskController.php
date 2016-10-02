<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 10/2/16
 * Time: 2:23 AM
 */

namespace app\controllers;


use app\db\Tasks;
use app\models\TaskCreation;
use Yii;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex() {
        return true;
    }

    public function actionCreate() {
        $model = new TaskCreation();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $task = new Tasks();

            return $this->render('create-confirm', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('create', ['model' => $model]);
        }
    }
}