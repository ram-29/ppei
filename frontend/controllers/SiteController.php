<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;

use frontend\models\Event;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
		}

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays indidvidual news or the News page.
     *
     * @return mixed
     */
    public function actionNewsAndEvents($year = null, $month = null, $slug = null) // Optional Params
    {
        $mYear = ((date('Y', 0) <= $year) && ($year <= date('Y')));
        $mMonth = ((1 <= $month) && ($month < 13));

        if($mYear && $mMonth && $slug){
            $model = Event::find()->where(['slug' => $slug])->one();
            if(!is_null($model)) return $this->render('event', ['model' => $model]);
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        if($mYear && $mMonth){
            $monthlyArticles = Event::find()->where(['like', 'date', $year.'-'.$month])->all();
            if($monthlyArticles) return var_dump(count($monthlyArticles));
            return Yii::$app->response->redirect(Url::to(['/news-and-events']));
        }

        if($mYear){
            $yearlyArticles = Event::find()->where(['like', 'date', $year])->all();
            if($yearlyArticles) return var_dump(count($yearlyArticles));
            return Yii::$app->response->redirect(Url::to(['/news-and-events']));
        }

        // TODO: Send an Error message if date less than 1970
        return $this->render('events');
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }    
}
