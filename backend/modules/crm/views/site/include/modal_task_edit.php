<script type="text/javascript">
    $(function() {

        $('.datep').datepicker();
        $('.dependent-select').dependentSelects({
            placeholderOption: '-- Please Select --'
        });
    });

</script>
<div class="body_modal_edit_task" id="<?= $task->id ?>">
    <div class="header_modal_edit_task">
        <input name="nDate" class="datep" value="<?= date("d.m.Y", strtotime($task->update_at)) ?>" readonly data-action="datep-sub">
        <input type="text" value="Повтор" style="margin-left: 10px;" readonly id="repiat" data-action="datep-sub">
        <div class="repiat_modal">
            <input type="checkbox" id="rp" style="width: 25px" data-action="datep-sub"><label for="rp">Повторять</label>
            <select name="location" id="mainSelect" class="form-control dependent-select">
                <option>-- Please Select --</option>
                <option value="">По дням > Каждый 2 день</option>
                <option value="">По дням > Каждый 3 день</option>
                <option value="">По дням > Каждый 4 день</option>
                <option value="">По дням > Каждый 5 день</option>
                <option value="">По дням > Каждый 6 день</option>
                <option value="weeek">Еженедельно</option>
                <option value="">Ежемесячно > В этот день</option>
                <option value="">Ежемесячно > Каждый день > 1</option>
                <option value="">Ежемесячно > Каждый день > 2</option>
            </select>
            <section style="display: none">
                <p><input type="checkbox" value="ПН" style="width: 20px" id="pn" class="checkboxSection"><label for="pn">Понедельник</label></p>
                <p><input type="checkbox" value="ПН" style="width: 20px" id="vt" class="checkboxSection"><label for="vt">Вторник</label></p>
                <p><input type="checkbox" value="ПН" style="width: 20px" id="sr" class="checkboxSection"><label for="sr">Среда</label></p>
                <p><input type="checkbox" value="ПН" style="width: 20px" id="cht" class="checkboxSection"><label for="cht">Четверг</label></p>
                <p><input type="checkbox" value="ПН" style="width: 20px" id="pt" class="checkboxSection"><label for="pt">Пятница</label></p>
                <p><input type="checkbox" value="ПН" style="width: 20px" id="sb" class="checkboxSection"><label for="sb">Суббота</label></p>
                <p><input type="checkbox" value="ПН" style="width: 20px" id="vs" class="checkboxSection"><label for="vs">Воскресенье</label></p>
            </section>
            <br>
            <label for="dp_end">До</label>
            <input id="dp_end" class="datep form-control" value="<?= date("d.m.Y", strtotime($task->create_at)) ?>" readonly data-action="datep">
        </div>
        <img src="/images/default/dPossible.png" title="Удалить">
        <img src="/images/default/danger_posive.png" title="Важность задачи">
        <img src="/images/default/action.png" title="Завершить задачу">
    </div>
    <div class="settings_modal_edit_task">
        <div id="block_select">
            <select class="form-control" style="width: 200px">
                <option value="call" <?= ($task->action == 'call') ? 'selected' : '' ?> >Звонок</option>
                <option value="action" <?= ($task->action == 'action') ? 'selected' : '' ?>>Действие</option>
                <option value="meeting" <?= ($task->action == 'meeting') ? 'selected' : '' ?>>Встреча</option>
            </select>
            <select class="form-control" style="margin-left: 10px; width: 200px" id="resp">
                <option value="">Ответственный</option>
                <?php foreach($users as $key => $user): ?>
                    <?php if($user->getUserForResp($user->id, $task->id) == 0): ?>
                        <option value="<?= $user->id ?>">
                            <?= $user->username ?>
                        </option>
                    <?php endif; ?>
                <?php endforeach;?>
            </select>
        </div>
        <div class="" id="block_info" style="margin: 20px 0 1px 0; position: relative">
            <span id="title_block_info">Задача поставлена:</span>
                <?php foreach($respons as $key => $respon): ?>
                    <span class="settings_info_responsible_modal_edit_task" id="<?= $respon->user->id ?>" style="cursor: pointer; position: relative"><?= $respon->user->username ?>;</span>
                <?php endforeach;?>
        </div>
    </div>
    <div class="bodys_modal_edit_task">
        автор: <?= $task->user->username ?>. Дата создания: <?= date('d.m.Y', strtotime($task->create_at)) ?>
    </div>
    <div class="text_edit__modal_task">
        <input name="nTitle" type="text" value="<?= $task->text ?>" class="form-control"><br>
        <textarea name="nDesc" id="" cols="5" rows="10" class="form-control" style="resize: none; height: 100px" placeholder="Описание задачи"></textarea>
    </div>
    <div class="files_modal_edit_task">
        <!--        Прикрепленные файлы-->
        <div class="drag" id="drag"
             ondragenter="dropenter(event);" ondragover="dropenter(event);"
             ondragleave="dropleave();" ondrop="return dodrop(event);" >
            Прикрепленные файлы
        </div>
        <div id="upload_overall">
        </div>
    </div>
    <div class="comments_modal_edit_task">
        <style>
            .commentsTask{
                padding-bottom: 10px;
            }
            .commentsTask img{
                width: 50px;
            }
        </style>
        <span style="padding: 5px 10px">Комментарии</span>
        <div class="blockComments">

        </div>
        <div class="btn_group_comments">
            <img src="/images/avatar-6.jpg" alt="" style="width: 92px; float: left; padding: 5px">
            <textarea type="text" placeholder="Ваш комментарий" style="resize: none; height: 100px; width: 84%"></textarea>
            <button class="btn btn-success" id="<?= yii::$app->user->getId() ?>">Отправить</button>
        </div>
    </div>
</div>