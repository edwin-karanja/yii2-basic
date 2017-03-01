<?php
/**
 * Created by PhpStorm.
 * User: Edu.K
 * Date: 1/03/2017
 * Time: 9:35 PM
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Status;

class StatusController extends Controller
{
    public function actionCreate()
    {
        $m = new Status;

        if ($m->load(Yii::$app->request->post()) && $m->validate()) {
            return $this->render('view', ['model' => $m]);
        } else{
            return $this->render('create', ['model' => $m]);
        }
    }
}