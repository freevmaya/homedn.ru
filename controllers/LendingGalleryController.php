<?php

namespace app\controllers;

use Yii;
use app\models\LendingGallery;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Page;

/**
 * LendingGalleryController implements the CRUD actions for LendingGallery model.
 */
class LendingGalleryController extends Controller
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
     * Lists all LendingGallery models.
     * @return mixed
     */
    public function actionIndex ()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => LendingGallery::find(),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LendingGallery model.
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
     * Creates a new LendingGallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate ()
    {
        $model = new LendingGallery();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([ 'view', 'id' => $model->id ]);
        }

        $page = Page::find()->joinWith('pageType pt', false, 'INNER JOIN')->where([ 'pt.code' => 'page' ])->orderBy([ 'name' => SORT_ASC ])->all();

        return $this->render('create', [
                    'model' => $model,
                    'page'  => $page,
        ]);
    }

    /**
     * Updates an existing LendingGallery model.
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

        $page = Page::find()->joinWith('pageType pt', false, 'INNER JOIN')->where([ 'pt.code' => 'page' ])->orderBy([ 'name' => SORT_ASC ])->all();

        return $this->render('update', [
                    'model' => $model,
                    'page'  => $page,
        ]);
    }

    /**
     * Deletes an existing LendingGallery model.
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
     * Finds the LendingGallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LendingGallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel ($id)
    {
        if (($model = LendingGallery::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
