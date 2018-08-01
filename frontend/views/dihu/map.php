<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

use frontend\models\Y;

$this->title = '地图';
// $this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">

</style>
<div class="body-content">
    <div class="row">
        <form action="<?=Url::toRoute('dihu/map')?>" method="get">
            <div class="input-group">
                <input type="text" placeholder="名称" name="title" value="<?php echo Y::Q()->get('title'); ?>" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
            </div>
        </form>
    </div>
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
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h2>还未发布 <a class="btn btn-default" href="/dihu/release">去发布</a></h2>
        <?php endif; ?>
    </div>
    <!--分页-->
    <div class="f-r">
        <?= LinkPager::widget([
            'pagination'=>$pages,
            'firstPageLabel' => '首页',
            'nextPageLabel' => '下一页',
            'prevPageLabel' => '上一页',
            'lastPageLabel' => '末页',
        ]) ?>
    </div>
</div>