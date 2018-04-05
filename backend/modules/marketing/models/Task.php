<?php

namespace app\modules\crm\models;

use Yii;
use app\modules\crm\models\Responsible;
use common\models\User;
/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $text
 * @property string $create_at
 * @property string $update_at
 * @property int $responsible
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_at', 'update_at'], 'safe'],
            [['creator_id'], 'integer'],
            [['text'], 'string', 'max' => 80],
            [['desc'], 'string', 'max' => 255],
            [['action'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'creator_id' => 'Creator',
            'action' => 'Creator',
            'desc' => 'Creator',
        ];
    }
    public function getResp($id){ // Получение ответственных
        $model = Responsible::find()->where(['task_id' => $id])->all();
        return $model;
    }
    public function getUser(){
        return $this->hasOne(User::className(), ['id' => 'creator_id']);
    }
    public function getDay($current){ // Считаем просроченные дни
        $difference = intval(abs(strtotime($current) - strtotime($this->create_at)));
        $days = $difference / (3600 * 24);
        return $days;
    }
}
