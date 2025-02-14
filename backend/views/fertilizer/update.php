<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fertilizer */

$this->title = 'Update Fertilizer: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Fertilizers', 'url' => ['index']];
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

