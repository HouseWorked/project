<?php

\backend\assets\CrmAsset::register($this);
$this->title = 'Задачи';
?>

<div class="button_line">
    <div class="col-xs-4" style="padding: 0">
        <select class="form-control">
            <option value="" disabled selected>Сотрудник</option>
            <option>Гончар Иван Владимирович</option>
            <option>Ясногурсий Сергей Евгеньевич</option>
        </select>
    </div>
    <div class="col-xs-4" style="padding: 0 8px">
        <select class="form-control">
            <option value="" disabled selected>Тип</option>
            <option>Звонок</option>
            <option>Действие</option>
            <option>Встреча</option>
        </select>
    </div>
    <button class="btn btn-success addPopup right" style="display: block; width: 200px" href="#add">Календарь</button>
</div>

<section class="truns" style="overflow-y: auto">
    <?php for($i = 0; $i < 5; $i++):?>
        <div class="table_truns">
            <div class="table_title_truns"><?= date('d.m.Y', strtotime('+'.$i.' day')) ?></div>
            <div class="string_add_task">
                <div class="add_task">
                    <span class="task_first" style="display: block; height: 50px;">Добавить задчу</span>
                    <input type="text" placeholder="Название задачи" style="display: none; background: white; height: 50px;" data-area="<?= $i ?>" data-create="<?= date('Y-m-d', strtotime('+'.$i.' day')) ?> ">
                </div>
                <?= $this->render('include/submenu', compact('i')); ?>
            </div>
            <div class="table_body_truns" id="body<?= $i ?>">
                <?= $this->render('include/task', compact('i')); ?>
            </div>
        </div>
    <?php endfor;?>
</section>





<div id="add" class="white-popup mfp-hide">
    <p style="text-align: right;"><a class="popup-modal-dismiss" href="#">Закрыть</a></p>
    Новое предложение
</div>
<div id="edit" class="white-popup mfp-hide">
    <p style="text-align: right;"><a class="popup-modal-dismiss" href="#">Закрыть</a></p>
    Новое предложение
</div>