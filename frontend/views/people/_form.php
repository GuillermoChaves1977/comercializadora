<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Thirdtypes;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\People */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="people-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'document')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direction')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <!-- $form->field($model, 'status')->textInput() -->

    
    <?= $form->field($model, 'id_thirdtypes')->dropDownList(Thirdtypes::getthirdtypes(),['prompt'=>'--Seleccione Tipo Tercero--']); ?>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
