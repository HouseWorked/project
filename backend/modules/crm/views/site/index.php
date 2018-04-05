<?php
use yii\helpers\Url;

\backend\assets\CrmAsset::register($this);
?>
<div class="full_block" style="background: white">
    <canvas id="popChart" width="400" height="200"></canvas>
</div>
<div class="half_block">
    <div class="title">Клиенты</div>
    <div class="body_static">
        Статистика
    </div>
</div>
<div class="half_block">
    <div class="title">Новые клиенты за сегодня</div>
    <div class="body_static">
        Статистика
    </div>
</div>
<div class="full_block">
    <div class="title">План продаж</div>
    <div class="body_static">
        <div class="common_goal">
            <p>Общая цель - <span id="total">500000</span> руб.</p>
            <p style="float: right">На период - <span>февраль 2018</span></p>
        </div>
        <div id="current_date">
            <p>Сегодня: <span id="CurrentDay"></span></p>
        </div>
        <div class="progress" style="position: relative; height: 30px">
            <div class="progress-bar" id="progres_goal" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="">
                <div class="complete_progress"><span id="complete_progress"></span>%</div>
                <div class="" id="progress_day" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="">
                    <span id="band">|</span>
                </div>
            </div>
        </div>
        <div class="edge" style="margin-bottom: 20px">
            <span>|</span>
            <span style="margin-left: 49%">|</span>
            <span style="float: right">|</span>
            <p>
                <span>1 февраля</span>
                <span style="float: right">28 февраля</span>
            </p>
        </div>
        <div class="block_static">
            <div class="title_static">выполнено</div>
            <div class="info_static">
                <span id="complete">240000</span> руб.
            </div>
        </div>
        <div class="block_static">
            <div class="title_static">Осталось</div>
            <div class="info_static">
                <span id="remainder"></span> руб.
            </div>
        </div>
        <div class="block_static">
            <div class="title_static">Выполение плана</div>
            <div class="info_static">
                <span id="procent_complete"></span> %
            </div>
        </div>
    </div>
    <div class="block_manager_info">
        <h1>Личные планы продаж</h1>
        <div class="manager">
            <?php if($user->avatar === null): ?>
                <img src="https://ui-avatars.com/api/?size=96&name=<?= $b[0] ?>+<?= $b[1] ?>&font-size=0.55&background=f00&color=fff&rounded=true" alt="" class="round" width="40" height="40">
            <?php else:?>
                <img src="<?= $user->avatar ?>" alt="" class="round">
            <?php endif;?>
            Гончар Иван Владимирович
            <div class="progress">
                <div class="progress-bar" id="" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                    <span class="personal_plan" data-current="11111" data-full="222222"></span>
                </div>
            </div>
        </div>
        <div class="manager">
            <?php if($user->avatar === null): ?>
                <img src="https://ui-avatars.com/api/?size=96&name=<?= $b[0] ?>+<?= $b[1] ?>&font-size=0.55&background=f00&color=fff&rounded=true" alt="" class="round" width="40" height="40">
            <?php else:?>
                <img src="<?= $user->avatar ?>" alt="" class="round">
            <?php endif;?>
            Гончар Иван Владимирович
            <div class="progress">
                <div class="progress-bar" id="" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                    <span class="personal_plan" data-current="400000" data-full="444444"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="full_block">
    fulll
</div>
