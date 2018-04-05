<?php

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
                <li class="<?= (Yii::$app->controller->module->id == 'app-backend') ? 'active' : '' ?>"><a href="<?= Url::to(['/marketing/site/index']) ?>">CRM-маркетинг</a></li>
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

    <div class="col-md-14" style="background: grey">
        <?= $content ?>

    </div>

    <footer class="">
        <div class="container" style="width: 70%;">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
