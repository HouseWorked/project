<?php

namespace backend\modules\marketing\controllers;

use yii;
use yii\web\Controller;
use common\models\User;

/**
 * Default controller for the `crm` module
 */
class SiteController extends Controller
{
    public $layout = 'crm';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex(){
        $user = Yii::$app->user->identity;

        $a = str_replace(' ', '', $user->username);
        $b = preg_split('/(?<=[а-я])(?=[А-Я])/u',$a);// Получене имени и фамилии
        return $this->render('index', [
            'user' => $user,
            'b' => $b
        ]);
    }
    public function actionScore(){
        return $this->render('score');
    }
    public function actionCompany(){
        return $this->render('company');
    }
    public function actionTruns(){
        return $this->render('truns');
    }
    public function actionSugg(){
        return $this->render('sugg');
    }
    public function actionTask(){
        return $this->render('task');
    }
    public function actionTest(){
        return json_encode([
            'status' => 'success',
            'content' => '11111'
        ]);
    }
}
