<?php
/**
 * Copyright (c) 2018. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <!-- Класс navbar-fixed-top прикрепляет меню к верхней части страницы -->
    <nav class="navbar navbar-inverse" style="border-radius: 0">
        <!-- Элемент с классом container или container-fluid необходим для центрирования и установки необходимых отступов слева и справа для контента -->
        <div class="container">
            <ul class="nav navbar-nav">
                <li class="<?= (Yii::$app->controller->module->id == 'app-backend') ? 'active' : '' ?>" ><a href="<?= Url::to(['/site/index']) ?>">Лента событий</a></li>
                <li class="<?= (Yii::$app->controller->module->id == 'crm') ? 'active' : '' ?>"><a href="<?= Url::to(['/crm/site/index']) ?>">CRM</a></li>
                <li><a href="#">Склад</a></li>
                <li><a href="#">Проекты</a></li>
                <li><a href="#">CRM-маркетинг</a></li>
                <li><?=
                    Html::beginForm(['/site/logout'], 'post').
                    Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    ). Html::endForm() ;
                    ?>
                </li>
            </ul>
        </div>
    </nav>
    <div class="col-md-2">
        <nav>
            <ul class="nav" id="left_nav">
                <li class="<?=  (Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>" >
                    <a href="<?= Url::to(['/crm/site/index']) ?>" class="">Статистика</a>
                </li>
                <li class="<?=  (Yii::$app->controller->action->id == 'task') ? 'active' : '' ?>" >
                    <a href="<?= Url::to(['/crm/site/task']) ?>" class="">Задачи</a>
                </li>
                <li class="<?=  (Yii::$app->controller->action->id == 'truns') ? 'active' : '' ?>" >
                    <a href="<?= Url::to(['/crm/site/truns']) ?>" class="">Сделки</a>
                </li>
                <li class="<?=  (Yii::$app->controller->action->id == 'sugg') ? 'active' : '' ?>" >
                    <a href="<?= Url::to(['/crm/site/sugg']) ?>" class="">Предложения</a>
                </li>
                <li class="<?=  (Yii::$app->controller->action->id == 'company') ? 'active' : '' ?>" >
                    <a href="<?= Url::to(['/crm/site/company']) ?>" class="">Компании</a>
                </li>
                <li class="<?=  (Yii::$app->controller->action->id == 'score') ? 'active' : '' ?>" >
                    <a href="<?= Url::to(['/crm/site/score']) ?>" class="">Счета</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="wrap_height" style="padding: 0 10px 0 0;">
        <?= $content ?>

    </div>

    <footer class="">
        <div class="info">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
</div>

<div class="modal_edit_task"></div> <!-- модалка редактирования задачи -->
<div id="substrate"></div> <!-- Подложка -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
