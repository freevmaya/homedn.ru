<?php

namespace app\controllers;

use Yii;
use app\models\PortfolioGallery;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Page;

/**
 * PortfolioGalleryController implements the CRUD actions for PortfolioGallery model.
 */
class PortfolioGalleryController extends Controller
{

    public $layout = 'admin';

    /**
     * {@inheritdoc}
     */
    public function behaviors ()
    {
        return [
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => [ 'POST' ],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow'   => true,
                        'actions' => [],
                        'roles'   => [ '@' ],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all PortfolioGallery models.
     * @return mixed
     */
    public function actionIndex ()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => PortfolioGallery::find(),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PortfolioGallery model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView ($id)
    {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PortfolioGallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate ()
    {
        $model = new PortfolioGallery();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([ 'view', 'id' => $model->id ]);
        }

        $pages = Page::find()->alias('p')->joinWith('pageType pt', false, 'INNER JOIN')->where([ 'pt.code' => 'portfolio-element' ])->orderBy([ 'p.name' => SORT_ASC ])->all();

        return $this->render('create', [
                    'model' => $model,
                    'pages' => $pages,
        ]);
    }

    /**
     * Updates an existing PortfolioGallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate ($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([ 'view', 'id' => $model->id ]);
        }

        $pages = Page::find()->alias('p')->joinWith('pageType pt', false, 'INNER JOIN')->where([ 'pt.code' => 'portfolio-element' ])->orderBy([ 'p.name' => SORT_ASC ])->all();

        return $this->render('update', [
                    'model' => $model,
                    'pages' => $pages,
        ]);
    }

    /**
     * Deletes an existing PortfolioGallery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete ($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect([ 'index' ]);
    }

    /**
     * Finds the PortfolioGallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PortfolioGallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel ($id)
    {
        if (($model = PortfolioGallery::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
