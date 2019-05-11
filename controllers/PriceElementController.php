<?php

namespace app\controllers;

use Yii;
use app\models\PriceElement;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\PriceCaption;

/**
 * PriceElementController implements the CRUD actions for PriceElement model.
 */
class PriceElementController extends Controller
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
     * Lists all PriceElement models.
     * @return mixed
     */
    public function actionIndex ($price_caption_id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => PriceElement::find()->where([ 'price_caption_id' => $price_caption_id ])->orderBy([ 'sort' => SORT_ASC ]),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'priceCaption' => PriceCaption::find()->where([ 'id' => $price_caption_id ])->one(),
        ]);
    }

    /**
     * Displays a single PriceElement model.
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
     * Creates a new PriceElement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate ($price_caption_id)
    {
        $model                   = new PriceElement();
        $model->price_caption_id = $price_caption_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([ 'view', 'id' => $model->id ]);
        }

        return $this->render('create', [
                    'model'        => $model,
                    'priceCaption' => PriceCaption::find()->where([ 'id' => $price_caption_id ])->one(),
        ]);
    }

    /**
     * Updates an existing PriceElement model.
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

        return $this->render('update', [
                    'model'        => $model,
                    'priceCaption' => PriceCaption::find()->where([ 'id' => $model->price_caption_id ])->one(),
        ]);
    }

    /**
     * Deletes an existing PriceElement model.
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
     * Finds the PriceElement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PriceElement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel ($id)
    {
        if (($model = PriceElement::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
