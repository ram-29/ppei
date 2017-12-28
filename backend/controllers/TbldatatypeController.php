<?php

namespace backend\controllers;

use Yii;
use backend\models\Tbldatatype;
use backend\models\TbldatatypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TbldatatypeController implements the CRUD actions for Tbldatatype model.
 */
class TbldatatypeController extends Controller
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
     * Lists all Tbldatatype models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TbldatatypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tbldatatype model.
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
     * Creates a new Tbldatatype model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (\Yii::$app->user->can('createDatatype')) 
        {

            $model = new Tbldatatype();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

        else{

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to Add Data-type. Please contact your web administrator.');

               return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing Tbldatatype model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (\Yii::$app->user->can('updateDatatype')) 
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
        else{

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to Update Data-type. Please contact your web administrator.');

               return $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing Tbldatatype model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (\Yii::$app->user->can('deleteDatatype')) 
        {

            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }

        else{

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to Delete Data-type. Please contact your web administrator.');

               return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Tbldatatype model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tbldatatype the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tbldatatype::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
