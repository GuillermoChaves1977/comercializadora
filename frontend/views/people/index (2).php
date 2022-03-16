<?php

use common\models\Thirdtypes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PeopleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Terceros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="people-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Tercero', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'document',
            'name',
            'direction',
            'city',
            'phone',
            //'status',
            //'id_thirdtypes',
            [
                //'label'=>'Tipo de Tercero',
                [
                    'attribute'=>'id_thirdtypes',
                    'value'=>array($searchModel, 'buscartipo'),
                    'filter'=>
                    Html::activeDropDownList($searchModel, 'id_thirdtypes',
                    ArrayHelper::map(Thirdtypes::find()->all(), 'id', 'name'),
                    ['prompt'=>'--Seleccione Tipo Tercero--',])
                ]
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, common\models\People $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
