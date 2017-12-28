<?php

namespace backend\controllers;

use Yii;
use backend\models\Tblcontent;
use backend\models\Tblfeature;
use backend\models\Tblgroup;
use backend\models\TblcontentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * TblcontentController implements the CRUD actions for Tblcontent model.
 */
class TblcontentController extends Controller
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
     * Lists all Tblcontent models.
     * @return mixed
     */
    public function actionIndex($feature_id)
    {
        $searchModel = new TblcontentSearch();
        $dataProvider = $searchModel->search(empty(Yii::$app->request->queryParams) ? $feature_id : Yii::$app->request->queryParams);
        
        $vis = Tblcontent::find()->where(['feature_id' => $feature_id])->andWhere(['attribute' => 'date'])->one();


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'feature_id' => $feature_id,
            'vis' => $vis,
        ]);
        // print_r($dataProvider);
        // die();
    }

    /**
     * Displays a single Tblcontent model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        //$group = Tblgroup::find('id')->where(['feature_id' => $])
        $group = Tblcontent::find('group_id')->where(['id' => $id])->one();
        $values = Tblcontent::find()->where(['group_id' => $group->group_id])->all();
        // print_r($values);
        // exit();

        return $this->render('view', [
            'model' => $this->findModel($id), 'group' => $group, 'group_id' => $group->group_id, 'values' => $values,
        ]);
    }

    /**
     * Creates a new Tblcontent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($feature_id)
    {
      if (\Yii::$app->user->can('createContent')) 
      {
        $model = new Tblcontent();
        $model2 = new Tblgroup();

        $feature = Tblfeature::find()->where(['id'=>$feature_id])->one();
        $attributes = unserialize($feature->attributes);


        if ($model->load(Yii::$app->request->post()))
        {
            if($feature->feature == "News and Events")
            {
        
                unset($_POST['_csrf-backend']);
                $imageName = 'image-'.microtime();
                $model->id;
                $model->images = UploadedFile::getInstance($model, 'images');
                $model->images->saveAs('uploads/images/events/'.$imageName.'.'.$model->images->extension);
                $model->images = 'uploads/images/events/'.$imageName.'.'.$model->images->extension;

                $_POST['Tblcontent']['images'] = $model->images;
                $model->content = array_filter($_POST);

                $group_id = $model2->id;
                $model2->feature_id = $feature_id;
                $model2->save();
               // print_r($group_id);

                foreach ($model->content['Tblcontent'] as $key => $value)
                {
                    $model = new Tblcontent();

                    $model->feature_id = $feature_id;
                    $model->group_id = $model2->id;
                    $model->attribute = $key;
                    $model->value = $value;
                    //echo $model->feature_id.': '.$model->group_id.': '.$model->attribute.': '.$model->value;
                    $model->save();
                }
                 // print_r($_POST);
                 // die();
                // $model->save();
                 return $this->redirect(['index', 'id' => $model->id, 'feature_id'=>$model->feature_id]);

            }

            elseif($feature->feature == "Stories of Change")
            {
        
                unset($_POST['_csrf-backend']);
                $imageName = 'image-'.microtime();
                $model->id;
                $model->images = UploadedFile::getInstance($model, 'images');
                $model->images->saveAs('uploads/images/story/'.$imageName.'.'.$model->images->extension);
                $model->images = 'uploads/images/story/'.$imageName.'.'.$model->images->extension;

                $_POST['Tblcontent']['images'] = $model->images;
                $model->content = array_filter($_POST);

                $group_id = $model2->id;
                $model2->feature_id = $feature_id;
                $model2->save();
               // print_r($group_id);

                foreach ($model->content['Tblcontent'] as $key => $value)
                {
                    $model = new Tblcontent();

                    $model->feature_id = $feature_id;
                    $model->group_id = $model2->id;
                    $model->attribute = $key;
                    $model->value = $value;
                    //echo $model->feature_id.': '.$model->group_id.': '.$model->attribute.': '.$model->value;
                    $model->save();
                }
                 // print_r($_POST);
                 // die();
                // $model->save();
                 return $this->redirect(['index', 'id' => $model->id, 'feature_id'=>$model->feature_id]);

            }

            elseif($feature->feature == "Partners")
            {
        
                unset($_POST['_csrf-backend']);
                $imageName = 'image-'.microtime();
                //$model->id;
                $model->images = UploadedFile::getInstance($model, 'images');
                $model->images->saveAs('uploads/images/partners/'.$imageName.'.'.$model->images->extension);
                $model->images = 'uploads/images/partners/'.$imageName.'.'.$model->images->extension;

                $_POST['Tblcontent']['images'] = $model->images;
                $model->content = array_filter($_POST);

                $group_id = $model2->id;
                $model2->feature_id = $feature_id;
                $model2->save();
               // print_r($group_id);

                foreach ($model->content['Tblcontent'] as $key => $value)
                {
                    $model = new Tblcontent();

                    $model->feature_id = $feature_id;
                    $model->group_id = $model2->id;
                    $model->attribute = $key;
                    $model->value = $value;
                    //echo $model->feature_id.': '.$model->group_id.': '.$model->attribute.': '.$model->value;
                    $model->save();
                }
                 // print_r($_POST);
                 // die();
                // $model->save();
                 return $this->redirect(['index', 'id' => $model->id, 'feature_id'=>$model->feature_id]);

            }

            // elseif($feature->feature == "Knowledge Hub")
            // {
        
            //     unset($_POST['_csrf-backend']);
            //     $model->id;
            //     $model->files = UploadedFile::getInstances($model, 'files');
            //     $model->files->saveAs('uploads/images/partners/'.$imageName.'.'.$model->files->extension);
            //     $model->files = 'uploads/images/partners/'.$imageName.'.'.$model->files->extension;

            //     $_POST['Tblcontent']['files'] = $model->files;
            //     $model->content = array_filter($_POST);

            //     $group_id = $model2->id;
            //     $model2->feature_id = $feature_id;
            //     //$model2->save();
            //    // print_r($group_id);

            //     foreach ($model->content['Tblcontent'] as $key => $value)
            //     {
            //         $model = new Tblcontent();

            //         $model->feature_id = $feature_id;
            //         $model->group_id = $model2->id;
            //         $model->attribute = $key;
            //         $model->value = $value;
            //         //echo $model->feature_id.': '.$model->group_id.': '.$model->attribute.': '.$model->value;
            //         $model->save();
            //     }
            //       // print_r($model->files);
            //       // die();
            //     // $model->save();
            //      return $this->redirect(['index', 'id' => $model->id, 'feature_id'=>$model->feature_id]);

            // }
            else
            {
                if(!empty(UploadedFile:: getInstance($model, 'files')))
                {
                     unset($_POST['_csrf-backend']);
                    
                    $model->id;
                    $model->files = UploadedFile::getInstance($model, 'files');
                    //$model->files = str_replace(' ', '_', $model->files);
                    $model->files->saveAs('uploads/'.str_replace(' ', '_', $model->files->name));

                    $_POST['Tblcontent']['files'] = $model->files;
                    $model->content = array_filter($_POST);

                    $group_id = $model2->id;
                    $model2->feature_id = $feature_id;
                    $model2->save();
                   // print_r($group_id);

                    foreach ($model->content['Tblcontent'] as $key => $value)
                    {
                        $model = new Tblcontent();

                        $model->feature_id = $feature_id;
                        $model->group_id = $model2->id;
                        $model->attribute = $key;
                        $model->value = $value;
                        //print_r($model->feature_id.': '.$model->group_id.': '.$model->attribute.': '.$model->value);
                        $model->save(false);
                    }
                 // print_r($_POST);
                 // die();
                // $model->save();
                 return $this->redirect(['index', 'id' => $model->id, 'feature_id'=>$model->feature_id]);
                }

                elseif(!empty(UploadedFile::getInstance($model, 'images')))
                {
                    unset($_POST['_csrf-backend']);
                    $imageName = 'image-'.microtime();
                    $model->id;
                    $model->images = UploadedFile::getInstance($model, 'images');
                    $model->images->saveAs('uploads/'.$imageName.'.'.$model->images->extension);
                    $model->images = 'uploads/'.$imageName.'.'.$model->images->extension;

                    $_POST['Tblcontent']['images'] = $model->images;
                    $model->content = array_filter($_POST);

                    $group_id = $model2->id;
                    $model2->feature_id = $feature_id;
                    $model2->save();
                   // print_r($group_id);

                    foreach ($model->content['Tblcontent'] as $key => $value)
                    {
                        $model = new Tblcontent();

                        $model->feature_id = $feature_id;
                        $model->group_id = $model2->id;
                        $model->attribute = $key;
                        $model->value = $value;
                        //echo $model->feature_id.': '.$model->group_id.': '.$model->attribute.': '.$model->value;
                        $model->save();
                    }
                     // print_r($_POST);
                     // die();
                    // $model->save();
                     return $this->redirect(['index', 'id' => $model->id, 'feature_id'=>$model->feature_id]);
                }

                else
                {
                    unset($_POST['_csrf-backend']);
                    $model->content = array_filter($_POST);

                    $group_id = $model2->id;
                    $model2->feature_id = $feature_id;
                    $model2->save();
                   // print_r($group_id);

                    foreach ($model->content['Tblcontent'] as $key => $value)
                    {
                        $model = new Tblcontent();

                        $model->feature_id = $feature_id;
                        $model->group_id = $model2->id;
                        $model->attribute = $key;
                        $model->value = $value;
                        //echo $model->feature_id.': '.$model->group_id.': '.$model->attribute.': '.$model->value;
                        $model->save();
                    }
                    return $this->redirect(['index', 'id' => $model->id, 'feature_id'=>$model->feature_id]);
                }
             
            }

        }
        else
        {
            $feature = Tblfeature::find()->where(['id'=>$feature_id])->all();
            return $this->render('create', [
                'model' => $model,
                'feature' => $feature,
                'feature_id' => $feature_id,
            ]);
        }
      }

      else{

        Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to add content to web feature. Please contact your web administrator.');

                $searchModel = new TblcontentSearch();
                $dataProvider = $searchModel->search(empty(Yii::$app->request->queryParams) ? $feature_id : Yii::$app->request->queryParams);
        
                $vis = Tblcontent::find()->where(['feature_id' => $feature_id])->andWhere(['attribute' => 'date'])->one();

                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'feature_id' => $feature_id,
                    'vis' => $vis,
                ]);
      }
    }

    /**
     * Updates an existing Tblcontent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
      // print_r($feature_id);
      // exit();

      if (\Yii::$app->user->can('updateContent')) 
      {
        $group_id = Tblcontent::find(['group_id'])->where(['id' => $id])->one();
        $ids = Tblcontent::find()->where(['group_id' => $group_id->group_id])->all();
        $model = $this->findModel($group_id);

       // $model = new Tblcontent();
        //$model2 = new Tblgroup();
        $feature_id = Tblcontent::find('feature_id')->where(['id' => $id])->one();
        //$feature = Tblfeature::find()->where(['id'=>$feature_id->feature_id])->one();

        $feature = Tblfeature::find()->where(['id'=>$feature_id])->all();

        $group_id = Tblcontent::find('group_id')->where(['id'=>$id])->one();
        $group_id = $group_id->group_id;
        $values = Tblcontent::find()->where(['group_id' => $group_id])->all();
        //$attributes = unserialize($feature->attributes);


        if ($model->load(Yii::$app->request->post()))
        {
            if($feature->feature == "News and Events")
            {
        
                unset($_POST['_csrf-backend']);
                $imageName = 'image-'.microtime();
                $model->id;
                $model->images = UploadedFile::getInstance($model, 'images');
                $model->images->saveAs('uploads/images/events/'.$imageName.'.'.$model->images->extension);
                $model->images = 'uploads/images/events/'.$imageName.'.'.$model->images->extension;

                $_POST['Tblcontent']['images'] = $model->images;
                $model->content = array_filter($_POST);

               // print_r($group_id);

                foreach ($model->content['Tblcontent'] as $key => $value)
                {
                    $model = $this->findModel($id);

                    $model->attribute = $key;
                    $model->value = $value;
                    //echo $model->feature_id.': '.$model->group_id.': '.$model->attribute.': '.$model->value;
                    $model->save();
                }
                 // print_r($_POST);
                 // die();
                // $model->save();
                 return $this->redirect(['view', 'id' => $id]);

            }

            elseif($feature->feature == "Stories of Change")
            {
        
                unset($_POST['_csrf-backend']);
                $imageName = 'image-'.microtime();
                $model->id;
                $model->images = UploadedFile::getInstance($model, 'images');
                $model->images->saveAs('uploads/images/story/'.$imageName.'.'.$model->images->extension);
                $model->images = 'uploads/images/story/'.$imageName.'.'.$model->images->extension;

                $_POST['Tblcontent']['images'] = $model->images;
                $model->content = array_filter($_POST);

                foreach ($model->content['Tblcontent'] as $key => $value)
                {
                    $model = $this->findModel($id);

                    $model->attribute = $key;
                    $model->value = $value;
                    //echo $model->feature_id.': '.$model->group_id.': '.$model->attribute.': '.$model->value;
                    $model->save();
                }
                 // print_r($_POST);
                 // die();
                // $model->save();
                return $this->redirect(['view', 'id' => $id]);

            }

            elseif($feature->feature == "Partners")
            {
        
                unset($_POST['_csrf-backend']);
                $imageName = 'image-'.microtime();
                //$model->id;
                $model->images = UploadedFile::getInstance($model, 'images');
                $model->images->saveAs('uploads/images/partners/'.$imageName.'.'.$model->images->extension);
                $model->images = 'uploads/images/partners/'.$imageName.'.'.$model->images->extension;

                $_POST['Tblcontent']['images'] = $model->images;
                $model->content = array_filter($_POST);

               // print_r($group_id);

                foreach ($model->content['Tblcontent'] as $key => $value)
                {
                    $model = $this->findModel($id);

                    $model->attribute = $key;
                    $model->value = $value;
                    //echo $model->feature_id.': '.$model->group_id.': '.$model->attribute.': '.$model->value;
                    $model->save();
                }
                 // print_r($_POST);
                 // die();
                // $model->save();
                 return $this->redirect(['view', 'id' => $id]);

            }


            else
            {
                if(!empty(UploadedFile:: getInstance($model, 'files')))
                {
                     unset($_POST['_csrf-backend']);
                    
                    $model->id;
                    $model->images = UploadedFile::getInstance($model, 'images');
                    $model->images->saveAs('uploads/'.$model->images->name);

                    $_POST['Tblcontent']['images'] = $model->images;
                    $model->content = array_filter($_POST);

                   // print_r($group_id);

                    foreach ($model->content['Tblcontent'] as $key => $value)
                    {
                        $model = $this->findModel($id);

                        $model->attribute = $key;
                        $model->value = $value;
                        //echo $model->feature_id.': '.$model->group_id.': '.$model->attribute.': '.$model->value;
                        $model->save();
                    }
                 // print_r($_POST);
                 // die();
                // $model->save();
                 return $this->redirect(['view', 'id' => $id]);
                }

                elseif(!empty(UploadedFile::getInstance($model, 'images')))
                {
                     unset($_POST['_csrf-backend']);
                    $imageName = 'image-'.microtime();
                    $model->id;
                    $model->images = UploadedFile::getInstance($model, 'images');
                    $model->images->saveAs('uploads/'.$imageName.'.'.$model->images->extension);
                    $model->images = 'uploads/'.$imageName.'.'.$model->images->extension;

                    $_POST['Tblcontent']['images'] = $model->images;
                    $model->content = array_filter($_POST);
                   // print_r($group_id);

                    foreach ($model->content['Tblcontent'] as $key => $value)
                    {
                        $model = $this->findModel($id);

                        $model->attribute = $key;
                        $model->value = $value;
                        //echo $model->feature_id.': '.$model->group_id.': '.$model->attribute.': '.$model->value;
                        $model->save();
                    }
                     // print_r($_POST);
                     // die();
                    // $model->save();
                    return $this->redirect(['view', 'id' => $id]);
                }

                else
                {
                    unset($_POST['_csrf-backend']);
                    $model->content = array_filter($_POST);

                   // print_r($group_id);

                    foreach ($model->content['Tblcontent'] as $key => $value)
                    {
                        $model = $this->findModel($id);

                        $model->attribute = $key;
                        $model->value = $value;
                        //echo $model->id.': '.$model->feature_id.': '.$model->group_id.': '.$model->attribute.': '.$model->value;
                        $model->save();
                    }
                    return $this->redirect(['view', 'id' => $id]);
                }
             
            }

        }
        else
        {
            $value = Tblcontent::find()->where(['group_id'=>$group_id])->all();
            return $this->render('update', [
                'model' => $model,
                'value' => $value,
                'feature_id' => $feature_id,
                'feature' => $feature,
            ]);
        }
      }
      else{

        $feature_id =Tblcontent::find(['feature_id'])->where(['id' => $id])->one();
        $feature_id = $feature_id->feature_id;

        Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to update content to web feature. Please contact your web administrator.');

              return $this->redirect(['index', 'feature_id'=>$feature_id]);
      }
    }

    /**
     * Deletes an existing Tblcontent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    // public function actionDelete($id)
    // {
    //     $feature_id = Tblcontent::find(['feature_id'])->where(['id' => $id])->one();
        
    //     if (\Yii::$app->user->can('updateContent')) 
    //     {
    //       $this->findModel($id)->delete();
    //       return $this->redirect(['index', 'feature_id'=>$feature_id->feature_id]);
    //     }

    //     else{

    //       Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to Delete content to web feature. Please contact your web administrator.');
    //       return $this->redirect(['index', 'feature_id'=>$feature_id->feature_id]);
    //     }
    // }

    public function actionDelete($id)
    {
        $group_id = Tblcontent::find(['group_id'])->where(['id' => $id])->one();
        $feature_id = Tblcontent::find(['feature_id'])->where(['id' => $id])->one();

        if (\Yii::$app->user->can('deleteContent')) 
        {
          Tblcontent::deleteAll(['group_id' => $group_id->group_id]);
          return $this->redirect(['index', 'feature_id'=>$feature_id->feature_id]);
        }

        else{
          
          Yii::$app->getSession()->setFlash('warning', 'Sorry, you are not authorized to Delete content to web feature. Please contact your web administrator.');

          return $this->redirect(['index', 'feature_id'=>$feature_id->feature_id]);
        }
    }

    /**
     * Finds the Tblcontent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblcontent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblcontent::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
