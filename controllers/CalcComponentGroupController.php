<?php

namespace app\controllers;

use Yii;
use app\models\CalcComponentGroup;
use app\models\CalcRoom;
use app\models\CalcInputdata;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CalcComponentGroupController implements the CRUD actions for CalcComponentGroup model.
 */
class CalcComponentGroupController extends Controller
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
     * Lists all CalcComponentGroup models.
     * @return mixed
     */
    public function actionIndex ()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CalcComponentGroup::find(),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CalcComponentGroup model.
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
     * Creates a new CalcComponentGroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate ()
    {
        $model = new CalcComponentGroup();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([ 'view', 'id' => $model->id ]);
        }

        $calcRooms           = CalcRoom::find()->orderBy([ 'sort' => SORT_ASC ])->all();
        $model->size_element = 1;

        $calcInputdata = CalcInputdata::RELATION_SET;

        return $this->render('create', [
                    'model'         => $model,
                    'calcRooms'     => $calcRooms,
                    'calcInputdata' => $calcInputdata,
        ]);
    }

    /**
     * Updates an existing CalcComponentGroup model.
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

        $calcRooms = CalcRoom::find()->orderBy([ 'sort' => SORT_ASC ])->all();
        
        $calcInputdata = CalcInputdata::RELATION_SET;

        return $this->render('update', [
                    'model'         => $model,
                    'calcRooms'     => $calcRooms,
                    'calcInputdata' => $calcInputdata,
        ]);
    }

    /**
     * Deletes an existing CalcComponentGroup model.
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
     * Finds the CalcComponentGroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CalcComponentGroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel ($id)
    {
        if (($model = CalcComponentGroup::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
