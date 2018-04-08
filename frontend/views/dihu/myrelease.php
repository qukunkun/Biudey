<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '我的发布';
// $this->params['breadcrumbs'][] = $this->title;
?>


<div class="body-content">

    <div class="row">
        <?php if(!empty($data)): ?>
            <?php foreach ($data as $key=>$value): ?>
            <div class="col-lg-4">
                <h2><?= $value['title']?></h2>
                <p><?=$value['area']?>平方米 <?=$value['price']?>元</p>
                <p><?=$value['contact_user']?> <?=$value['contact_phone']?></p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>
                <p><?= $value['address']?></p>
                <p><?= $value['time']?></p>
                <p>
                    <a class="btn btn-default" href="http://www.yiiframework.com/doc/">查看详情 &raquo;</a>
                    <a class="btn btn-default edit" href="/dihu/release?id=<?=$value['id']?>" >编辑</a>
                    <button class="btn btn-default del" onclick="del(<?=$value['id']?>)">删除</button>
                </p>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h2>还未发布 <a class="btn btn-default" href="/dihu/release">发布</a></h2>
        <?php endif; ?>
    </div>

</div>

<script>
    function del(id){

        $.ajax({
            type: "POST",
            url : '/dihu/delete',
            data: {"id":id},
            dateType: "JSON",
            success: function(res){
                var data = eval("("+res+")");
                console.log(data);
                if(data.status > 0){
                    window.location.href = location.href;
                }else{
                    alert(data.message);
                }
            }
        });
    }
</script>