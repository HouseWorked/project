<?php

use common\models\User;
$users = User::find()->all();
?>
<ul class='emp' style="display: none">
    <?php foreach($users as $key => $user): ?>
        <li class='emp<?= $i ?>' data-user="<?= $user->id ?>"> <img src="/images/avatar-6.jpg" alt="" width="75" height="75" style="margin-right: 20px"><?= $user->username ?></li>
    <?php endforeach;?>
</ul>
<ul class='act' style="display: none">
    <li class='act<?= $i ?>' data-user="Звонок">    <img src="/images/avatar-6.jpg" alt="" width="75" height="75" style="margin-right: 20px">Звонок     </li>
    <li class='act<?= $i ?>' data-user="Встреча">   <img src="/images/avatar-6.jpg" alt="" width="75" height="75" style="margin-right: 20px">Встреча    </li>
    <li class='act<?= $i ?>' data-user="Действие">  <img src="/images/avatar-6.jpg" alt="" width="75" height="75" style="margin-right: 20px">Действие   </li>
</ul>