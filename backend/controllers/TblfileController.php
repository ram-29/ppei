<?php

namespace backend\controllers;

use Yii;
use backend\models\Tblfile;
use backend\models\TblfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * TblfileController implements the CRUD actions for Tblfile model.
 */
class TblfileController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
              'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete', 'download'],
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
     * Lists all Tblfile models.
     * @return mixed
     */
    public function actionIndex($folder_id)
    {
        $files = Tblfile::find()->where(['folder_id' => $folder_id])->all();
        $searchModel = new TblfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'files' => $files,
            'folder_id' => $folder_id,
        ]);
    }

    /**
     * Displays a single Tblfile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($file_id, $folder_id)
    {
        $files = Tblfile::find()->where(['id' => $file_id])->all();
        return $this->render('view', [
            'model' => $this->findModel($file_id),
            'folder_id' => $folder_id,
            'file_id' => $file_id,
            'files' => $files,
        ]);
    }

    /**
     * Creates a new Tblfile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($folder_id)
    {
        if(\Yii::$app->user->can('createFile'))
        {
            $model = new Tblfile();

            if ($model->load(Yii::$app->request->post()))
            {
                $model->files = UploadedFile:: getInstances($model, 'files');
                $model->files = str_replace(' ', '_', $model->files);
                $date = date('M d, Y');
                foreach ($model->files as $key => $file) 
                {
                     $model1 = new Tblfile();

                     $file->saveAs('uploads/adminfolder/'.$file);
                     $model1->name = $file->name;
                     $model1->folder_id = $folder_id;
                     $model1->date = $date;
                     $model1->save(false);
                     // var_dump($model1->name);
                }
                return $this->redirect(['index', 'folder_id' => $model->folder_id]);
            }

            else
            {
                return $this->render('create', [
                    'model' => $model,
                    'folder_id' => $folder_id,
                ]);
            }
        }

        else{

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to Upload File in this folder. Please contact your web administrator.');
               return $this->redirect(['index', 'folder_id' => $folder_id]);
        }
    }

    /**
     * Updates an existing Tblfile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        // $fileName = Tblfile::find(['name'])->where(['id' => $id])->one();
        // array_map('unlink', glob('uploads/adminfolder/'.$fileName->name));
        
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
     * Deletes an existing Tblfile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id, $folder_id)
    {
        if(\Yii::$app->user->can('deleteFile'))
        {
            $fileName = Tblfile::find(['name'])->where(['id' => $id])->one();
            array_map('unlink', glob('uploads/adminfolder/'.$fileName->name));

            $this->findModel($id)->delete();

            return $this->redirect(['index', 'folder_id'=>$folder_id]);
        }

        else{

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to Delete File in this folder. Please contact your web administrator.');
               return $this->redirect(['index', 'folder_id' => $folder_id,]);
        }
    }

    public function actionDownload($id, $folder_id)
    {
        if(\Yii::$app->user->can('downloadFile'))
        {
            $file = Tblfile::find()->where(['id' => $id])->one();
            $dir_path = 'uploads/adminfolder';
            $fileName = $dir_path.'/'.$file->name;

            if (file_exists($fileName))
            {
                // return Yii::app()->getRequest()->sendFile($name, @file_get_contents($fileName));
                return  Yii::$app->response->sendFile($fileName);
            }
                            
            else
            {
                throw new CHttpException(404, 'The requested page does not exist.');
            }
        }

        else{

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to Download File in this folder. Please contact your web administrator.');
               return $this->redirect(['index', 'folder_id' => $folder_id,]);
        }          
    }

    /**
     * Finds the Tblfile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblfile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblfile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
