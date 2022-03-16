<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-info fixed-top',
        ],
    ]);
   
    if (Yii::$app->user->isGuest) {
        //$menuItems[] = ['label' => 'Registro de Usuario', 'url' => ['/site/signup']];//para crear usuarios temporalmente*/    
        $menuItems[] = ['label' => 'Ingresar', 'url' => ['/site/login']];
        $menuItems[] = ['label' => 'Salir', 'url' => ['/categories/lista']];
        
    } else {


        $menuItems = [

            //------------------------------------NUEVO MENU--------------------------------
    
            ['label' => 'Inicio', 'url' => ['/site/index']],
    
                array('label'=>'Inventario',
                'items'=>array(
                array('label'=>'Categorias', 'url'=>array('/categories/index','view'=>'Categorias')),
                array('label'=>'Productos', 'url'=>array('/articles/index','view'=>'productos')),
                array('label'=>'Bodegas', 'url'=>array('/site/index','view'=>'bodegas')),
                ),
                ),
    
                array('label'=>'Ventas',
                'items'=>array(
                array('label'=>'Registrar', 'url'=>array('/site/index','view'=>'productos')),
                array('label'=>'Consultar', 'url'=>array('/site/index','view'=>'bodegas')),
                ),
                ),
    
                array('label'=>'Compras',
                'items'=>array(
                array('label'=>'Registrar', 'url'=>array('/site/index','view'=>'productos')),
                array('label'=>'Consultar', 'url'=>array('/site/index','view'=>'bodegas')),
                ),
                ),
    
                array('label'=>'Administración',
                'items'=>array(
                array('label'=>'Terceros', 'url'=>array('/people/index','view'=>'terceros')),
                array('label'=>'Gastos', 'url'=>array('/site/index','view'=>'terceros')),
                array('label'=>'Reportes', 'url'=>array('/site/index','view'=>'productos')),
                array('label'=>'Usuarios', 'url'=>array('/site/index','view'=>'productos')),
                array('label'=>'Configuraciones', 'url'=>array('/site/index','view'=>'bodegas')),
                ),
                ),
    
                 //------------------------------------FIN NUEVO MENU--------------------------------
           
           
           
            /*['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],*/
        ];

        //$menuItems[] = ['label' => 'Crear Usuario', 'url' => ['/site/signup']];


        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                'Salir (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container" style="background-color:#C2E4EE">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted" >
    <div class="container">
        <div class="col-md-6"><img src="<?=Yii::getAlias('@web')?>
                                /../web/img/Logo.png" alt='Empresa Tis@'>
        </div>
        <!--<p class="float-left">&copy; Guillermo Patiño Chaves - 3218165554</p>
        <p class="float-right"><?= Yii::powered() ?></p>-->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
