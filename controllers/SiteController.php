<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Page;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors ()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => [ 'logout' ],
                'rules' => [
                    [
                        'actions' => [ 'logout' ],
                        'allow'   => true,
                        'roles'   => [ '@' ],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'logout' => [ 'post' ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions ()
    {
        return [
            'error'   => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class'           => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
//    public function actionIndex()
//    {
//        return $this->render('index');
//    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin ()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect([ 'admin' ]);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect([ 'admin' ]);
        }

        $model->password = '';
        $this->layout    = 'login';
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout ()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Main admin page
     * 
     * @return Response|string
     */
    public function actionAdmin ()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect([ 'login' ]);
        }

        $this->layout = 'admin';

        return $this->render('admin');
    }

    public function actionFrontend ($id)
    {
        $content = Page::find()->where([ 'id' => $id, 'status' => 1 ])->one();
        if ($content) {
            return $this->render($content->template ? $content->template->path_front : $content->pageType->template->path_front, [
                        'model' => $content,
            ]);
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionFileManager ()
    {
        $this->layout = 'admin';
        return $this->render('filemanager');
    }

}
