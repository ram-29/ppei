<?php

namespace backend\controllers;

use Yii;
use backend\models\TblalbumImage;
use backend\models\Tblalbum;
use backend\models\TblalbumImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;

/**
 * TblalbumImageController implements the CRUD actions for TblalbumImage model.
 */
class TblalbumImageController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                  [
                    'allow' => true,
                    'roles' => ['@']
                  ]
                            
              ],
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
     * Lists all TblalbumImage models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new TblalbumImageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $albums = Tblalbum::find()->where(['id' => $id])->all();
        $images = TblalbumImage::find()->where(['album_id' => $id])->all();
        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'images'=> $images,
            'albums'=> $albums,
            'id'=>$id,
        ]);
    }
    /**
     * Displays a single TblalbumImage model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblalbumImage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        if(\Yii::$app->user->can('createPhotoGallery'))
        {
            $model = new TblalbumImage();

            $album = Tblalbum::find('name')->where(['id' => $id])->one();
            

            //var_dump($album_name);

            if ($model->load(Yii::$app->request->post())) 
            {   
      
                $model->imageNames = UploadedFile:: getInstances($model, 'imageNames');
                foreach ($model->imageNames as $key => $file) 
                {
                    $model1 = new TblalbumImage();

                    $file->saveAs('uploads/images/albums/'.$album->name.'/'.$file);

                    $model1->album_id = $id;
                    $model1->image_name = $file->name;
                    $model1->save(false);
                    
                }
                
                return $this->redirect(['index', 'id' => $id]);
            } 
            else 
            {
                return $this->render('create', [
                    'model' => $model,
                    'id'=> $id,
                ]);
            }
        }

        else{

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to create Photo Gallery. Please contact your web administrator.');
               return $this->redirect(['index', 'id' => $id]);
        }
    }

    /**
     * Updates an existing TblalbumImage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblalbumImage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id, $album_id)
    {
        if(\Yii::$app->user->can('deletePhotoGallery'))
        {   
             $albumName = Tblalbum::find(['name'])->where(['id'=>$album_id])->one();
             $imageName = TblalbumImage::find(['name'])->where(['id' => $id])->one();
             array_map('unlink', glob('uploads/images/albums/'.$albumName->name.'/'.$imageName->image_name));

            $this->findModel($id)->delete();

            return $this->redirect(['index', 'id'=>$album_id]);
        }

        else{

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to Delete Photo Gallery. Please contact your web administrator.');
               return $this->redirect(['index', 'id' => $id]);
        }
    }

    /**
     * Finds the TblalbumImage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblalbumImage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblalbumImage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
