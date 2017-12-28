<?php

namespace backend\controllers;

use Yii;
use backend\models\Tblattribute;
use backend\models\TblattributeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TblattributeController implements the CRUD actions for Tblattribute model.
 */
class TblattributeController extends Controller
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
     * Lists all Tblattribute models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblattributeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblattribute model.
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
     * Creates a new Tblattribute model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(\Yii::$app->user->can('createAttribute'))
        {
            $model = new Tblattribute();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

        else{

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to create Attribute. Please contact your web administrator.');
               return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing Tblattribute model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(\Yii::$app->user->can('updateAttribute'))
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

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to update Attribute. Please contact your web administrator.');
               return $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing Tblattribute model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(\Yii::$app->user->can('deleteAttribute'))
        {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }

        else{

            Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to Delete Attribute. Please contact your web administrator.');
               return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Tblattribute model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblattribute the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblattribute::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
