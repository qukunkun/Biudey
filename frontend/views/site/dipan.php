<?php

use yii\helpers\Html;
$this->title = '我的地盘';

////用户id</span>
//$user_id = Yii::$app->user->identity->id;
//echo $user_id.'<br/>';
////用户名
//$user_name = Yii::$app->user->identity->username;
//echo $user_name;
?>
<style>
    .col-lg-5{height: 400px;}
    .col-lg-5 .col-lg-12{height: 185px;}
    .col-lg-1{height: 30px;}

</style>
<div class="row">
    <div class="col-lg-5 btn btn-success">
       我的购买
    </div>

    <div class="col-lg-2"></div>

    <div class="col-lg-5">
        <a href="/dihu/release">
            <div class="col-lg-12 btn btn-success">我要发布</div>
        </a>
        <div class="col-lg-1">

        </div>
        <a href="/dihu/myrelease">
            <div class="col-lg-12 btn btn-primary">我的发布</div>
        </a>
    </div>
</div>