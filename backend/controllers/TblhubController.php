<?php

namespace backend\controllers;

use Yii;
use backend\models\Tblhub;
use backend\models\TblhubSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * TblhubController implements the CRUD actions for Tblhub model.
 */
class TblhubController extends Controller
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
     * Lists all Tblhub models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblhubSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblhub model.
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
     * Creates a new Tblhub model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(\Yii::$app->user->can('createKnowledgehub'))
        {
            $model = new Tblhub();

            if ($model->load(Yii::$app->request->post())) 
            {   
      
                $model->fileNames = UploadedFile:: getInstances($model, 'fileNames');
                foreach ($model->fileNames as $key => $file) 
                {
                     $model2 = new Tblhub();

                     $model2->phase_id = $model->phase_id;
                     $model2->hcategory_id = $model->hcategory_id;
                     $model2->resource_id = $model->resource_id;
                     $model2->status = $model->status;
                     $file->saveAs('uploads/hubfiles/'.str_replace(' ', '_', $file));
                     $model2->file_name = str_replace(' ', '_', $file);
                     //echo $model2->phase_id.': '.$model2->hcategory_id.': '.$model2->resource_id.': '.$model2->file_name.':-- ';
                     $model2->save(false);
                     // var_dump($model1->image_name);
                    
                }
                //var_dump($file);
                
                return $this->redirect(['index']);
            }
            else
            {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

        else{

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to upload resources in knowledge hub. Please contact your web administrator.');
               return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing Tblhub model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(\Yii::$app->user->can('updateKnowledgehub'))
        {
            $model = $this->findModel($id);
            $prevName = $model->file_name;

            if ($model->load(Yii::$app->request->post()))
            {
                
                $model->file = UploadedFile::getInstance($model, 'file');
                if(!empty($model->file))
                {
                    $model->file->saveAs('uploads/hubfiles/'.str_replace(' ', '_', $model->file->name));
                    $model->file_name = str_replace(' ', '_', $model->file->name);
                        if($model->file->name != $prevName)
                        {
                            array_map('unlink', glob('uploads/hubfiles/'.$prevName));
                        }
                    $model->save(false);
                    return $this->redirect(['index']);
                }

                $model->file_name = $prevName;
                $model->save();
                return $this->redirect(['index']);
            }
            
            else
            {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }

        else{

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to Update Knowledge HUb. Please contact your web administrator.');
               return $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing Tblhub model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(\Yii::$app->user->can('deleteKnowledgehub'))
        {
            $fileName = Tblhub::find(['file_name'])->where(['id' => $id])->one();
            array_map('unlink', glob('uploads/hubfiles/'.$fileName->file_name));
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }

        else{

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to Delete resources in Knowledge HUb. Please contact your web administrator.');
               return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Tblhub model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblhub the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblhub::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
