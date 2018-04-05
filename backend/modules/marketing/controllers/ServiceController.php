<?php

namespace backend\modules\crm\controllers;

use yii;
use yii\web\Controller;
use common\models\User;
use app\modules\crm\models\Task;
use app\modules\crm\models\Responsible;

/**
 * Default controller for the `crm` module
 */
class ServiceController extends Controller{

    public function actionGraficProfit(){
        $data1 = [
            "10",
            "7",
            "8",
            "44",
        ];
        $data2 = [
            "123",
            "333",
            "21",
            "123",
        ];
        $label = [
            'Январь',
            'Ферваль',
            'Март',
            'Апрель',
            'Май',
            'Июнь',
            'Июль',
            'Август',
            'Сентябрь',
            'Октябрь',
            'Ноябрь',
            'Декабрь',
        ];
        return json_encode([
            'status' => 'success',
            'content1' => $data1,
            'content2' => $data2,
            'label' => $label
        ]);
    }
    public function actionNewTask(){
        $i = yii::$app->request->post('area');
        $resps =  yii::$app->request->post('resp'); //ответственный
        $task = new Task();
        $task->text = yii::$app->request->post('text');
        $task->create_at = date('Y-m-d', strtotime('+'.$i.' day'));
        $task->update_at = date('Y-m-d', strtotime('+'.$i.' day'));
        $task->creator_id = yii::$app->user->getId();

        if($task->save()){
            $responsible = new Responsible();
            $task_id = Yii::$app->db->lastInsertID;
            foreach ($resps as $index => $resp) {
                $responsible->isNewRecord = true;
                $responsible->id = null;
                $responsible->user_id = $resp;
                $responsible->task_id = $task_id;
                $responsible->save();
            }
            if($responsible->save()){
                return json_encode([
                    'status' => 'success',
                    'content' => $this->renderAjax('/site/include/task', compact('i'))
                ]);
            }else{ // если ответственный не сохранился
                return json_encode([
                    'status' => 'fail',
                    'content' => $responsible->getErrors()
                ]);
            }

        }else{ //t если задача не сохранилась
            return json_encode([
                'status' => 'fail',
                'content' => $task->getErrors()
            ]);
        }
    }
    public function actionTaskEdit(){
        $id = yii::$app->request->post('id');
        $task = Task::find()->where(['id' => $id])->one();
        $respons = Responsible::find()->where(['task_id' => $id])->all();
        $users = User::find()->all();
        return json_encode([
            'status' => 'success',
            'content' => $this->renderAjax('/site/include/modal_task_edit', compact('task', 'respons', 'users'))
        ]);
    }
    public function actionNewDateEdit($id){ // Изменение данных задачи (Дата выполнения, описание, название задачи)
        $modelTask = Task::find()->where(['id' => $id])->one();
        $modelTask->text = yii::$app->request->post('title');
        $modelTask->desc = yii::$app->request->post('desc');
        $modelTask->update_at = date('Y-m-d', strtotime(yii::$app->request->post('date')));

        if($modelTask->save()){
            return json_encode([
                'status' => 'success',
            ]);
        }else{
            return json_encode([
                'status' => 'fail',
            ]);
        }

    }
}
