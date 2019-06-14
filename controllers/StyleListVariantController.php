<?php

namespace app\controllers;

use Yii;
use app\models\StyleListVariant;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\StyleList;

/**
 * StyleListVariantController implements the CRUD actions for StyleListVariant model.
 */
class StyleListVariantController extends Controller
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
     * Lists all StyleListVariant models.
     * @return mixed
     */
    public function actionIndex ()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => StyleListVariant::find(),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StyleListVariant model.
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
     * Creates a new StyleListVariant model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate ()
    {
        $model = new StyleListVariant();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([ 'view', 'id' => $model->id ]);
        }

        $styleList = StyleList::find()->orderBy([ 'page_id' => SORT_ASC, 'sort' => SORT_ASC, 'name' => SORT_ASC ])->all();

        return $this->render('create', [
                    'model'     => $model,
                    'styleList' => $styleList,
        ]);
    }

    /**
     * Updates an existing StyleListVariant model.
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
        $styleList = StyleList::find()->orderBy([ 'page_id' => SORT_ASC, 'sort' => SORT_ASC, 'name' => SORT_ASC ])->all();

        return $this->render('update', [
                    'model'     => $model,
                    'styleList' => $styleList,
        ]);
    }

    /**
     * Deletes an existing StyleListVariant model.
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
     * Finds the StyleListVariant model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StyleListVariant the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel ($id)
    {
        if (($model = StyleListVariant::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
