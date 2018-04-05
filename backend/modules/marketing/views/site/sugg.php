<?php
use yii\helpers\Url;

\backend\assets\CrmAsset::register($this);
?>
<div class="button_line">
    <div class="col-xs-4" style="padding: 0">
        <select class="form-control">
            <option value="" disabled selected>Ответственный</option>
            <option>Гончар Иван Владимирович</option>
            <option>Ясногурсий Сергей Евгеньевич</option>
        </select>
    </div>
    <div class="col-xs-2" style="padding: 0 8px">
        <select class="form-control">
            <option value="" disabled selected>Статус</option>
            <option>В обработке</option>
            <option>Подтверждено</option>
            <option>Выйграно</option>
            <option>Проиграно</option>

        </select>
    </div>
    <div class="col-xs-2" style="padding: 0">
        <input type="text" class="form-control" placeholder="По дате">
    </div>

    <button class="btn btn-success addPopup right" style="display: block" href="#add">Добавить предложение</button>
</div>



<div class="container_sugg">
    <table class="table table-striped">
        <thead>
        <tr>
            <th style="text-align: center; width: 60px;">№ п/п</th>
            <th style="text-align: center;">Предложение</th>
            <th style="text-align: center; width: 100px;">Статус</th>
            <th style="text-align: center;">Ответственный</th>
            <th style="text-align: center; width: 200px;">Дата создания</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php for($i = 0; $i < 20; $i++):?>
            <tr id="<?= $i ?>">
                <td style="text-align: center; width: 60px;"><?= ($i+1) ?></td>
                <td style="text-align: center;">Возможность подписать договор на оптовую покупку</td>
                <?= $i >= 15 ? "<td style='text-align: center;'><span class='fail'>Откланено</span></td>" : "<td style='text-align: center;'><span class='good'>Подтверждено</span></td>" ?>
                <td style="text-align: center;">Гончар Иван Владимирович</td>
                <td style="text-align: center;">22 февраля 2018 г.</td>
                <td>
                   <img src="/images/default/ePossible.png" alt="" class="button_edit_sugg addPopup" width="25" height="20" href="#edit">
                   <img src="/images/default/dPossible.png" alt="" class="button_delete_sugg addPopup" width="25" height="20" href="#delete">
                </td>
            </tr>
        <?php endfor;?>
        </tbody>
    </table>
</div>
<div id="add" class="white-popup mfp-hide">
    <p style="text-align: right;"><a class="popup-modal-dismiss" href="#">Закрыть</a></p>
    Новое предложение
</div>
<div id="edit" class="white-popup mfp-hide">
    <p style="text-align: right;"><a class="popup-modal-dismiss" href="#">Закрыть</a></p>
    Редактировать предложение
</div>
<div id="delete" class="white-popup mfp-hide" style="width: 350px">
    В случае удаления записи будут стерты все данные косающиеся предложения. Удалить?
    <br>
    <br>
    <p class="btn btn-success right btn_delete" style="margin-bottom: 5px" data-id="">Точно!</p>
    <p class="btn btn-danger right popup-modal-dismiss">Я еще подумаю..</p>
</div>