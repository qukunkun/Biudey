<?php
echo '00';
//用户id</span>
$user_id = Yii::$app->user->identity->id;
echo $user_id.'<br/>';
//用户名
$user_name = Yii::$app->user->identity->username;
echo $user_name;