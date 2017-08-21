    <?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '注册';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'repassword') ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('common','Signup'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

<!--                <div class="distpicker">-->
<!--                    <select data-province="---- 选择省 ----"></select>-->
<!--                    <select data-city="---- 选择市 ----"></select>-->
<!--                    <select data-district="---- 选择区 ----"></select>-->
<!--                </div>-->
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<!--<script>-->
<!--//    $(.distpicker).distpicker();-->
<!--</script>-->
