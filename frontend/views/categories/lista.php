<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
<br>
<h2>PORTAFOLIO DE PRODUCTOS</h2>
<br>
<div class="row">
    <?php foreach ($listas as $lista):   ?>

        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <a href="#" class="thumbnail">
                <?= Html::img($lista->image); ?>
                <br>
                <center><?= Html::encode("{$lista->name}")  ?></center>
            </a>
        </div>
       <?php endforeach;?>
</div>

<br>

<?= LinkPager::widget(['pagination'=>$paginacion])  ?>