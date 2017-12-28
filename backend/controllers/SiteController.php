<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginForm;
use backend\models\Tblactivity;
use backend\models\Tblfeature;
use backend\models\Tblgroup;
use backend\models\User;
use backend\models\siteSearch;
use backend\models\Tblcontent;
use backend\models\Tblfile;
use backend\models\Tblhub;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'view', 'messages', 'search'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $groupIds = Tblgroup::find()->where(['feature_id' => '35'])->all();
        
        // $activities = Tblcontent::find()->all();
        $features = Tblfeature::find()->all();
        return $this->render('index', ['features'=>$features, 'groupIds' => $groupIds]);
    }

    public function actionMessages()
    {
        return $this->render('messages');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) 
        {
            return $this->goBack();
        }
        else 
        {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    // public function actionView()
    // {
    //     $id = yii::$app->user->identity->id;
    //     $model = new User();
    //     return $this->render('view', [
    //         'id' => $id, 'model' => $model->id,
    //         //'id' => $id, 'model' => $model->findModel($id),
    //     ]);
    //     // var_dump($id);
    // }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSearch()
    {
        //$searchModel = Tblcontent::find()->where(['value' => $params])->all();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (isset($_POST['data']))
        {
            $data = $_POST['data'];

            $query = Tblcontent::find(['value'])->where(['value' => $data])->filterWhere(['like', 'value', $data])->all();

            $query2 = Tblfile::find(['name'])->where(['name' => $data])->filterWhere(['like', 'name', $data])->all();

            $query3 = Tblhub::find(['file_name'])->where(['file_name' => $data])->filterWhere(['like', 'file_name', str_replace(' ', '_', $data)])->all();

            return $this->render('search', ['query' => $query, 'query2' => $query2, 'query3' => $query3, 'data' => $data]);
        }

        else{

             return $this->render('search');
        }

       
    }
}
