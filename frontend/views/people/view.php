<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\People */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Terceros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="people-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Está Seguro de Eliminar el Tercero?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'document',
            'name',
            'direction',
            'city',
            'phone',
            //'status',
            //'id_thirdtypes',
            [
                'label'=>'Tipo de Tercero',
                'attribute'=>'id_thirdtypes',
                'value'=>'llillo'
            ],
        ],
    ]) ?>

</div>
