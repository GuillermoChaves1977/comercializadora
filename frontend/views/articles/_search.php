<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArticlesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'existence') ?>

    <?= $form->field($model, 'purchase_price') ?>

    <?php // echo $form->field($model, 'sale_price') ?>

    <?php // echo $form->field($model, 'weighted') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'id_category') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
