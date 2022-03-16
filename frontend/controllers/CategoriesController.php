<?php

namespace frontend\controllers;

use common\models\Categories;
use common\models\CategoriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

//para adjuntar la imagen utilizar esta clase
use yii\web\UploadedFile;
//para paginacion del a lista de caegorias
use yii\data\Pagination;

//para controlar el acceso
use yii\filters\AccessControl;

/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class CategoriesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::className(),
                'only'=>['index'],
                'rules'=>[
                    [
                        'allow'=>true, //permite acceso a todos los logueados
                        'roles'=>['@']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(), 
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Categories models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CategoriesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categories model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Categories();

        $this->uploadImage($model);

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $this->uploadImage($model);
 
         return $this->render('update', [
             'model' => $model,
         ]);
    }

    /**
     * Deletes an existing Categories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        //borrar la imagen de upload
        if (file_exists($model->image)){
            unlink($model->image);
        }
        $model->delete();

        return $this->redirect(['index']);
    }

     //funcion para mostrar la lista de las categorias------------------------------------------
     public function actionLista(){

        $model=Categories::find();

        $paginacion=new Pagination([
            'defaultPageSize'=>3,
            'totalCount'=>$model->count()
        ]);

        $listas=$model->orderBy('name')->offset($paginacion->offset)->limit($paginacion->limit)->all();

        return $this->render('lista', ['listas'=>$listas, 'paginacion'=>$paginacion]);

    }

    /**
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categories::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //--------------------------METODO PARA SUBIR LAS IMAGENES----------------------
    protected function uploadImage(Categories $model){

        if ($model->load($this->request->post()) ) {

            $model->archive=UploadedFile::getInstance($model, 'archive');

            if($model->rules()){

                if ($model->archive){

                    if (file_exists($model->image)){
                        unlink($model->image);
                    }
                    
                    $filepath='uploads/'.time().'_'.$model->archive->baseName.".".$model->archive->extension;
                    //ruta de la imagen en la carpeta uploads con el tiempo para no reescribir

                    if($model->archive->saveAs($filepath)){
                        $model->image=$filepath;
                    }
                }
            }
            if($model->save(false)){
                return $this->redirect(['index']);
            }
            
        }
    

}
}
