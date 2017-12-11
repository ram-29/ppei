<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

use common\models\Content;
use common\models\Feature;
use common\models\Group;

use common\models\Album;

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
        return $this->render('index', $this->getArticles('News & Events'));
    }

    /**
     * Displays indidvidual news or the News page.
     *
     * @return mixed
     */
    public function actionNewsAndEvents($year = null, $month = null, $slug = null) // Optional Params
    {
        $mYear = ((date('Y', 0) <= $year) && ($year <= date('Y')));
        $mMonth = ((1 <= $month) && ($month <= 12));

        if (!is_null($year) && !is_null($month) && !is_null($slug)) {
            if ($mYear && $mMonth) {
                // $model = Event::find()
                //     ->where(['like', 'date', $year.'-'.$month])
                //     ->andWhere(['slug' => $slug])->one();
                // if (!is_null($model)) {
                    
                // }
                return $this->render('event', [
                        // 'model' => $model,
                        'slug' => $slug
                ]);
                throw new NotFoundHttpException('The requested page does not exist.');
            }
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return $this->render('events', $this->getArticles('News & Events'));
    }

    /**
     * Displays knowledge hub page.
     *
     * @return mixed
     */
    public function actionKnowledgeHub()
    {
        return $this->render('hub');
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
     * Displays gallery page.
     *
     * @return mixed
     */
    public function actionGallery()
    {
        $albums = Album::find()->all();
        $mAlbums = [];

        foreach($albums as $album){
            array_push($mAlbums, [
                'id' => $album['id'],
                'name' => $album['name'],
                'images' => ArrayHelper::getColumn($album->images, function($element){
                    return [
                        'id' => $element['id'],
                        'name' => $element['name']
                    ];
                })
            ]);
        }

        return $this->render('gallery', [
            'albums' => $mAlbums
        ]);
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
		
		public function getArticles($featureName)
		{
				$feature = Feature::findOne(['name' => $featureName]);
				$groups = $feature->getGroups();

				$contents = $groups
					->addSelect([
						'tblgroup.*',
						'title.value as title',
                        'content.value as content',
                        'images.value as images',
                        'date_posted.value as date_posted',
                        'slug.value as slug',
                        'user.value as user'
					])
					->joinWith([
						'contents title' => 
							function($q){ $q->onCondition(['title.attribute' => 'title']); }
					])
					->joinWith([
						'contents content' => 
							function($q){ $q->onCondition(['content.attribute' => 'content']); }
                    ])
                    ->joinWith([
						'contents images' => 
							function($q){ $q->onCondition(['images.attribute' => 'images']); }
					])
					->joinWith([
						'contents date_posted' => 
							function($q){ $q->onCondition(['date_posted.attribute' => 'date_posted']); }
                    ])
                    ->joinWith([
						'contents slug' => 
							function($q){ $q->onCondition(['slug.attribute' => 'slug']); }
                    ])
                    ->joinWith([
						'contents user' => 
							function($q){ $q->onCondition(['user.attribute' => 'user']); }
					])
					->asArray()
					->orderBy(['date_posted' => SORT_DESC])
					->all();

				$pagination = new Pagination([
					'defaultPageSize' => 16,
					'totalCount' => count($contents)
				]);

				$contents = $this->removeArrayItem(
                    $groups->offset($pagination->offset)
						->limit($pagination->limit)
                        ->all()
                    , 'contents');

				return [
                    'featureName' => $featureName,
                    'headers' => array_splice($contents, 0, 3),
                    'subHeads' => array_splice($contents, 0, 3),
					'contents' => $contents,
					'pagination' => $pagination
				];
		}

		public function removeArrayItem(array $array, string $item)
		{
			for ($i=0; $i <= count($array); $i++) { 
				unset($array[$i][$item]); 
			}
			return $array;
		}
}
