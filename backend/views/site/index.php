<?php

/* @var $this yii\web\View */

$this->title = 'Лента событий';
\backend\assets\LentaAsset::register($this);
?>
<div class="col-md-2">
    <nav>
        <ul class="nav" id="left_nav">
            <li><a href="#message" class="left_nav mpopup">Сообщения</a></li>
            <li><a href="#vote" class="left_nav mpopup">Голосования</a></li>
            <li><a href="#event" class="left_nav mpopup">Событие</a></li>
        </ul>
    </nav>
</div>
<div class="col-md-7" style="margin-top: -20px">
    <h1>Лента событий</h1>
    <div class="site-index">
        <?php for($i = 0; $i < 3; $i++):?>
            <div class="add_news news">
                <?php if($user->avatar === null): ?>
                    <img src="https://ui-avatars.com/api/?size=96&name=<?= $b[0] ?>+<?= $b[1] ?>&font-size=0.55&background=f00&color=fff&rounded=true" alt="" class="round">
                <?php else:?>
                    <img src="<?= $user->avatar ?>" alt="" class="round">
                <?php endif; ?>

                <div class="title_block">
                    Определение кому направлено сообщение  Определение кому направлено сообщение
                </div>
                <div class="text_block">
                    последнее время в веб-дизайне становится очень популярным использование круглых изображений. Пример можно увидеть у меня на блоге, миниатюры к записям выводятся максимально скругленные, то есть абсолютно круглыми. Существуют разные способы реализации вывода круглых картинок. Проверенный годами, работающий во всех браузерах без исключения, это предварительная подготовка изображений в графическом редакторе, когда из стандартной картинки выделяется область круга и обрезается по контуру.
                    Теперь, это уже прошлый век, способ конечно надёжный, но не практичный. С помощью свойств CSS можно добиться тех же самых результатов, при этом избавив себя от необходимости подготавливать каждое изображение.
                </div>
                <div class="footer_block">
                    <a href="#" class="btn_comment_event" id="<?= $i ?>">Комментировать</a>
                    <a href="#"><i class="glyphicon glyphicon-heart" aria-hidden="true"></i> Нравится <span>10</span></a>
                    <a href="#">Удалить</a>
                    <span class="time_block">вчера, 11:11</span>
                </div>
                <div class="comment_lent id_<?= $i ?>">
                    <?php if($user->avatar === null): ?>
                        <img src="https://ui-avatars.com/api/?size=40&name=<?= $b[0] ?>+<?= $b[1] ?>&font-size=0.55&background=f00&color=fff&rounded=true" alt="" class="round" style="">
                    <?php else:?>
                        <img src="<?= $user->avatar ?>" alt="" class="round" style="">
                    <?php endif; ?>
                    <span style="position: absolute">Имя комментатора, вчера 12:55</span><br>
                    <div class="text" style="margin: -30px 0 0 65px;">
                        Знаете, я пока не очень понимаю, но мне уже нравится эта идея!
                    </div>
                    <div class="footer_block" style="margin: 20px 0 0 65px;">
                        <a href="#">Ответить</a>
                        <a href="#"><i class="glyphicon glyphicon-heart" aria-hidden="true"></i> Нравится <span>10</span></a>
                        <a href="#">Удалить</a>
                    </div>
                </div>
                <div class="comment_lent id_<?= $i ?>">
                    <?php if($user->avatar === null): ?>
                        <img src="https://ui-avatars.com/api/?size=96&name=<?= $b[0] ?>+<?= $b[1] ?>&font-size=0.55&background=f00&color=fff&rounded=true" alt="" class="round" style="margin: -170px 0 0 0;">
                    <?php else:?>
                        <img src="<?= $user->avatar ?>" alt="" class="round" style="margin: -170px 0 0 0;">
                    <?php endif; ?>
                    <textarea name="" id="input_comment" cols="30" rows="10" placeholder="Ваш комментарий"></textarea>
                    <button class="btn btn-primary" style="margin: 20px 0 0 63px;">Отправить</button>
                </div>
            </div>
        <?php endfor;?>
    </div>
</div>
<div class="col-md-3">
    <a href="#employee" class="btn btn-primary button_add_worker mpopup" style="width: 100%">Пригласить сотрудников <i class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin: 2px 0 0 15px;"></i></a>
    <div class="block_notice" style="width: 100%">
        <div class="title">Уведомления</div>
        <div class="text" style="padding: 10px; background: white">
            <?php if($user->avatar === null): ?>
                <img src="https://ui-avatars.com/api/?size=96&name=<?= $b[0] ?>+<?= $b[1] ?>&font-size=0.55&background=f00&color=fff&rounded=true" alt="" class="round">
            <?php else:?>
                <img src="<?= $user->avatar ?>" alt="" class="round">
            <?php endif; ?>
            <span style="margin-left: 5px">Тот кто отправил уведомление</span><br>
            <span style="color: grey; margin-left: 7px"> вчера, 17:59</span>
            <a href="#">Здесь мы будем общаться в «живой ленте» и чатах, вести проекты,
                ставить задачи, планировать день, работать с клиентами и многое другое.
                В офисе, в командировке, удаленно</a>
        </div>
        <div class="button_group">
            < 1 / 1 >
        </div>
    </div>
    <div class="block_notice" style="width: 100%">
        <div class="title">Задачи</div>
        <div class="text" style="background: white">
            <ul class="task_info">
                <li>Делаю</li>
                <li>Поручил</li>
                <li>Наблюдаю</li>
            </ul>
        </div>
    </div>
</div>
<div id="message" class="white-popup mfp-hide">
    <p style="text-align: right;"><a class="popup-modal-dismiss" href="#">Закрыть</a></p>
    сообщение
</div>
<div id="vote" class="white-popup mfp-hide">
    <p style="text-align: right;"><a class="popup-modal-dismiss" href="#">Закрыть</a></p>
    голосование
</div>
<div id="event" class="white-popup mfp-hide">
    <p style="text-align: right;"><a class="popup-modal-dismiss" href="#">Закрыть</a></p>
    событие
</div>
<div id="employee" class="white-popup mfp-hide">
    <p style="text-align: right;"><a class="popup-modal-dismiss" href="#">Закрыть</a></p>
    Новый сотрудник
</div>