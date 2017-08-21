<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
<!--    --><?php
//    NavBar::begin([
//        'brandLabel' => Yii::t('common', 'My Company'),
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => [
//            'class' => 'navbar-inverse navbar-fixed-top',
//        ],
//    ]);
//    $menuItemsLeft = [
//        ['label' => Yii::t('common', 'Home'), 'url' => ['/site/index']],
//        ['label' => Yii::t('common', 'About'), 'url' => ['/site/about']],
//        ['label' => Yii::t('common', 'Contact'), 'url' => ['/site/contact']],
//        ['label' => '地盘', 'url' => ['/site/dipan']],
//    ];
//    if (Yii::$app->user->isGuest) {
//        $menuItemsRight[] = ['label' => Yii::t('common','Signup'), 'url' => ['/site/signup']];
//        $menuItemsRight[] = ['label' => Yii::t('common','Login'), 'url' => ['/site/login']];
//    } else {
//        $menuItemsRight[] = '<li>'
//            . Html::beginForm(['/site/logout'], 'post')
//            . Html::submitButton(
//                'Logout (' . Yii::$app->user->identity->username . ')',
//                ['class' => 'btn btn-link logout']
//            )
//            . Html::endForm()
//            . '</li>';
//    }
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-right'],
//        'items' => $menuItemsRight,
//    ]);
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-left'],
//        'items' => $menuItemsLeft,
//    ]);
//
//   // echo Nav::widget([
//   //     'options' => ['class' => 'navbar-nav navbar-right'],
//   //     'items' => [
//   //         ['label' => Yii::t('common', 'Home'), 'url' => ['/site/index']],
//   //     ],
//   // ]);
//
//    NavBar::end();
//    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<!--<footer class="footer">-->
<!--    <div class="container">-->
<!--        <p class="pull-left">&copy; My Company --><?//= date('Y') ?><!--</p>-->
<!---->
<!--        <p class="pull-right">--><?////= Yii::powered() ?><!--<!--</p>-->-->
<!--    </div>-->
<!--</footer>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
