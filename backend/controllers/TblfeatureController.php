<?php

namespace backend\controllers;

use Yii;
use backend\models\Tblfeature;
use backend\models\TblfeatureSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Tblattribute;
use yii\filters\AccessControl;
use backend\models\Tblgroup;
use backend\models\Tblcontent;

/**
 * TblfeatureController implements the CRUD actions for Tblfeature model.
 */
class TblfeatureController extends Controller
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
     * Lists all Tblfeature models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblfeatureSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblfeature model.
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
     * Creates a new Tblfeature model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (\Yii::$app->user->can('createFeature')) 
        {

            $model = new Tblfeature();

            if ($model->load(Yii::$app->request->post()))
            {
                if(empty($_POST['attributes']))
                {

                     Yii::$app->getSession()->setFlash('warning', 'You must select Attributes');
                     $options = Tblattribute::find()->all();
                    //$options = $db->query('SELECT `attribute`, `data_type` FROM `tblattribute`')->fetchAll();
                     return $this->render('_form', [
                            'model' => $model,
                            'options' => $options,
                        ]);
                }

                elseif (!isset($_POST['isVisible']))
                {
                    Yii::$app->getSession()->setFlash('warning', 'Please select whether this Feature will be displayed on public page or not');
                     $options = Tblattribute::find()->all();
                    //$options = $db->query('SELECT `attribute`, `data_type` FROM `tblattribute`')->fetchAll();
                     return $this->render('_form', [
                            'model' => $model,
                            'options' => $options,
                        ]);
                }

                else
                {
                    $model->attributes = serialize($_POST['attributes']);
                    $model->isVisible = $_POST['isVisible'];
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->id]);
                }
                
            }

            else 
            {
                $options = Tblattribute::find()->all();
                //$options = $db->query('SELECT `attribute`, `data_type` FROM `tblattribute`')->fetchAll();
                return $this->render('_form', [
                        'model' => $model,
                        'options' => $options,
                    ]);
            }

        }

        else {

                Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to create Feature. Please contact your web administrator.');

                $searchModel = new TblfeatureSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            }   
    }

    /**
     * Updates an existing Tblfeature model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (\Yii::$app->user->can('updateFeature')) 
        {

            $model = $this->findModel($id);

            $options = Tblattribute::find()->all();
            $attributes = Tblfeature::find()->where(['id' => $id])->all();
            //var_dump(unserialize($att->attributes));
            //$attributes = unserialize($att->attributes);
             if ($model->load(Yii::$app->request->post()))
            {
                if(empty($_POST['attributes']))
                {

                     Yii::$app->getSession()->setFlash('warning', 'You must select Attributes');
                     $options = Tblattribute::find()->all();
                    //$options = $db->query('SELECT `attribute`, `data_type` FROM `tblattribute`')->fetchAll();
                     return $this->render('_updateForm', [
                        'model' => $model,
                        'options' => $options,
                        'attributes' => $attributes,
                    ]);
                }

                if (!isset($_POST['isVisible'])) 
                {
                    Yii::$app->getSession()->setFlash('warning', 'Please select whether this Feature will be displayed on public page or not');
                     $options = Tblattribute::find()->all();
                     return $this->render('_updateForm', [
                        'model' => $model,
                                'options' => $options,
                                'attributes' => $attributes,
                            ]);

                         }

                        else
                        {
                            $model->attributes = serialize($_POST['attributes']);
                            $model->isVisible = $_POST['isVisible'];
                            $model->save();
                            return $this->redirect(['view', 'id' => $model->id]);
                        }
                        
                    }

                    else 
                    {
                        $options = Tblattribute::find()->all();
                        return $this->render('_updateForm', [
                                'model' => $model,
                                'options' => $options,
                                'attributes' => $attributes,
                            ]);
                    }
            }

            else {

                Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to update Feature. Please contact your web administrator.');

                $searchModel = new TblfeatureSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            }
    }

    /**
     * Deletes an existing Tblfeature model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (\Yii::$app->user->can('deleteFeature')) 
        {

            Tblcontent::deleteAll(['feature_id' => $id]);
            Tblgroup::deleteAll(['feature_id' => $id]);

            $this->findModel($id)->delete();

            return $this->redirect(['index']);

        }

        else{

                Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to delete Feature. Please contact your web administrator.');

               return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Tblfeature model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblfeature the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblfeature::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
