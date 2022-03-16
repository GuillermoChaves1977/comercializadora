<?php

use common\models\Categories;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'existence')->textInput() ?>

    <?= $form->field($model, 'purchase_price')->textInput() ?>

    <?= $form->field($model, 'sale_price')->textInput() ?>

    <?= $form->field($model, 'weighted')->textInput() ?>

    <!--se llama a la funcion para obetener la Categoria, funcion creada en el modelo categoria-->

    <?= $form->field($model, 'id_category')->dropDownList(Categories::getCategories()) ?>
    
    <div class="form-group">

        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<!--Chtml::listData(Categories::tableName()->findAll(), 'id', 'name')) ?>
