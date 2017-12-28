<?php

namespace backend\controllers;

use Yii;
use backend\models\Tblfolder;
use backend\models\TblfolderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\Tblfile;

/**
 * TblfolderController implements the CRUD actions for Tblfolder model.
 */
class TblfolderController extends Controller
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
     * Lists all Tblfolder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $folders = Tblfolder::find()->all();

        $searchModel = new TblfolderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'folders' => $folders,
        ]);
    }

    /**
     * Displays a single Tblfolder model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->redirect(['tblfile/index', 'folder_id' => $id]);
    }

    /**
     * Creates a new Tblfolder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(\Yii::$app->user->can('createFolder'))
        {
            $model = new Tblfolder();

            if ($model->load(Yii::$app->request->post()) && $model->save()) 
            {
                return $this->redirect(['tblfile/index', 'folder_id' => $model->id]);
            } 
            else 
            {
                return $this->render('create', [
                    'model' => $model, 
                ]);
            }
        }

        else{

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to Create folder. Please contact your web administrator.');
               return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing Tblfolder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(\Yii::$app->user->can())
        {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

        else{

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to Update Folder. Please contact your web administrator.');
               return $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing Tblfolder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(\Yii::$app->user->can())
        {
             $files = Tblfile::find(['name'])->where(['folder_id'=>$id])->all();
             foreach ($files as $file) 
             {
                 unlink('uploads/adminfolder/'.$file->name);
             }
             Tblfile::deleteAll(['folder_id' => $id]);
             $this->findModel($id)->delete();

             return $this->redirect(['index']);
         }

         else{

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to Delete Folder. Please contact your web administrator.');
               return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Tblfolder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblfolder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblfolder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
