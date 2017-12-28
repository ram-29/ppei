<?php

namespace backend\controllers;

use Yii;
use backend\models\Tblalbum;
use backend\models\TblalbumImage;
use backend\models\TblalbumSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TblalbumController implements the CRUD actions for Tblalbum model.
 */
class TblalbumController extends Controller
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
     * Lists all Tblalbum models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblalbumSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $albums = Tblalbum::find()->all();
        


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'albums'=> $albums,
            //'images'=> $images,
        ]);

        
    }


    /**
     * Displays a single Tblalbum model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        // return $this->render('view', [
        //     'model' => $this->findModel($id),
        // ]);

        return $this->redirect(['tblalbum-image/index', 'id' => $id]);
    }

    /**
     * Creates a new Tblalbum model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(\Yii::$app->user->can('CreatePhotoGallery'))
        {
            $model = new Tblalbum();

            if ($model->load(Yii::$app->request->post()))
            {

                $albumName = htmlspecialchars(strip_tags(trim($model->name)));

                //$rootFolder    = __DIR__ . "/uploads/images/albums/";
                //$folder2Create = __DIR__ . "/uploads/images/albums/".$albumName;
                $folderCreated = mkdir('uploads/images/albums/'.$albumName, 0777, true);
                $model->name = $albumName;
                
                //var_dump($folderCreated);
                $model->save();
                return $this->redirect(['tblalbum-image/index', 'id' => $model->id]);

            }

            else
            {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

        else{

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to Create Album. Please contact your web administrator.');
               return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing Tblalbum model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(\Yii::$app->user->can('updatePhotoGallery'))
        {
            $model = $this->findModel($id);
            $oldAlbum = Tblalbum::find(['name'])->where(['id' => $id])->one();

            if ($model->load(Yii::$app->request->post()))
            {

                $albumName = htmlspecialchars(strip_tags(trim($model->name)));
                rename('uploads/images/albums/'.$oldAlbum->name, 'uploads/images/albums/'.$albumName);
                $model->name = $albumName;
                
                //var_dump($folderCreated);
                $model->save();
                return $this->redirect(['tblalbum/index']);

            }

            else 
            {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }

        else{

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to Update Album. Please contact your web administrator.');
               return $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing Tblalbum model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(\Yii::$app->user->can('deletePhotoGallery'))
        {
            $dir = Tblalbum::find(['name'])->where(['id'=>$id])->one();
            TblalbumImage::deleteAll(['album_id' => $id]);
            array_map('unlink', glob('uploads/images/albums/'.$dir->name.'/*'));
            rmdir('uploads/images/albums/'.$dir->name);

            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }

        else{

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to Delete Album. Please contact your web administrator.');
               return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Tblalbum model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblalbum the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblalbum::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
