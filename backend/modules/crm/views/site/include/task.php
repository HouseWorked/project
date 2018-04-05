<?php

use app\modules\crm\models\Task;

$current = date('Y-m-d', strtotime( date('Y-m-d')) + $i * 24 * 3600);
$tasks = task::find()->all();

?>
<?php foreach($tasks as $key => $task): ?>
    <?php if($task->update_at <  $current && $i == 0): ?>
        <div class="task_truns" id="<?= $task->id ?>">
            <img src="/images/default/handle-drag-black.png" alt="gdf" class="handle">
            <div class="header_task_truns" style="width: 85%">
                <p>
                    <?= $task->text ?>
                </p>
            </div>
            <div class="time_truns" style="width: 30px; right: -5px">
                <img src="/images/default/phone.png" alt="Звонок"  width="20" height="20" style="cursor: default">
                <img src="/images/default/action.png" alt="Дейтвие" width="20" height="20" style="cursor: default">
                <img src="/images/default/party.png" alt="Встреча"  width="20" height="20" style="cursor: default">
            </div>
            <div class="body_task_truns">
                <span class="responsible_truns">
                    Задача поставлена: <br>
                    <?php foreach($task->getResp($task->id) as $key => $user): ?>
                        <span style="font-size: 18px"><?= $user->user->username ?></span><br>
                    <?php endforeach;?>
                </span>
            </div>
            <div class="task_overdue">Просрочено на <?= $task->getDay($current); ?> дня</div>
        </div>
    <?php endif; ?>
<?php endforeach;?>
<?php foreach($tasks as $key => $task): ?>
    <?php if($task->update_at ===  $current): ?>
        <div class="task_truns taskComplete" id="<?= $task->id ?>" href="#edit">
            <img src="/images/default/handle-drag-black.png" alt="gdf" class="handle">
            <div class="header_task_truns" style="width: 85%">
                <p>
                    <?= $task->text ?>
                </p>
            </div>
            <div class="time_truns" style="width: 30px; right: -5px">
                <img src="/images/default/phone.png" alt="Звонок"  width="20" height="20" style="cursor: default">
                <img src="/images/default/action.png" alt="Дейтвие" width="20" height="20" style="cursor: default">
                <img src="/images/default/party.png" alt="Встреча"  width="20" height="20" style="cursor: default">
            </div>
            <div class="body_task_truns">
                <span class="responsible_truns">
                    Задача поставлена: <br>
                    <?php foreach($task->getResp($task->id) as $key => $user): ?>
                        <span style="font-size: 18px"><?= $user->user->username ?></span><br>
                    <?php endforeach;?>
                </span>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach;?>
