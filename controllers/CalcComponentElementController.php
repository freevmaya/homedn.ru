<?php

namespace app\controllers;

use Yii;
use app\models\CalcComponentElement;
use app\models\CalcComponentGroup;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CalcComponentElementController implements the CRUD actions for CalcComponentElement model.
 */
class CalcComponentElementController extends Controller
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
     * Lists all CalcComponentElement models.
     * @return mixed
     */
    public function actionIndex ()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CalcComponentElement::find(),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CalcComponentElement model.
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
     * Creates a new CalcComponentElement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate ()
    {
        $model = new CalcComponentElement();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->default) {
                $elements = CalcComponentElement::find()->where([ 'not', [ 'id' => $model->id ] ])->andWhere([ 'group_id' => $model->group_id, 'local_group' => $model->local_group ])->all();
                foreach ($elements as $el) {
                    $el->default = 0;
                    $el->save();
                }
            }
            return $this->redirect([ 'view', 'id' => $model->id ]);
        }

        $calcComponentGroups = CalcComponentGroup::find()->orderBy([ 'sort' => SORT_ASC ])->all();

        return $this->render('create', [
                    'model'               => $model,
                    'calcComponentGroups' => $calcComponentGroups,
        ]);
    }

    /**
     * Updates an existing CalcComponentElement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate ($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->default) {
                $elements = CalcComponentElement::find()->where([ 'not', [ 'id' => $model->id ] ])->andWhere([ 'group_id' => $model->group_id, 'local_group' => $model->local_group ])->all();
                foreach ($elements as $el) {
                    $el->default = 0;
                    $el->save();
                }
            }
            return $this->redirect([ 'view', 'id' => $model->id ]);
        }

        $calcComponentGroups = CalcComponentGroup::find()->orderBy([ 'sort' => SORT_ASC ])->all();

        return $this->render('update', [
                    'model'               => $model,
                    'calcComponentGroups' => $calcComponentGroups,
        ]);
    }

    /**
     * Deletes an existing CalcComponentElement model.
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
     * Finds the CalcComponentElement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CalcComponentElement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel ($id)
    {
        if (($model = CalcComponentElement::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
