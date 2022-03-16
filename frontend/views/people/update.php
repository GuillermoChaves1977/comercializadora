<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\People */

$this->title = 'Actualizar Tercero: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Terceros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="people-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
