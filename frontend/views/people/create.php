<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\People */

$this->title = 'Crear Tercero';
$this->params['breadcrumbs'][] = ['label' => 'Terceros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="people-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
