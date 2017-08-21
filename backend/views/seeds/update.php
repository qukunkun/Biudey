<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Seeds */

$this->title = 'Update Seeds: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Seeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wrapper wrapper-content">

    <div class="ibox-content">

        <div class="auth-item-update">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
