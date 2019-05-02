<?php

namespace app\controllers;

use Yii;
use app\models\SiteOption;
use app\models\OptionType;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SiteOptionValueController implements the CRUD actions for SiteOption model.
 */
class SiteOptionValueController extends Controller
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
     * Lists all SiteOption models.
     * @return mixed
     */
    public function actionIndex ()
    {

        if (Yii::$app->request->isPost) {
            $formProp = Yii::$app->request->post();
            foreach ($formProp as $code => $prop) {
                if ($p = SiteOption::find()->where([ 'code' => $code ])->one()) {
                    $p->value = $prop;
                    $p->save();
                }
            }
        }

        $siteOptions = SiteOption::find()->orderBy([ 'sort' => SORT_ASC ])->all();

        return $this->render('index', [
                    'siteOptions' => $siteOptions,
        ]);
    }

    /**
     * Displays a single SiteOption model.
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
     * Creates a new SiteOption model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate ()
    {
        $model = new SiteOption();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([ 'view', 'id' => $model->id ]);
        }

        $optionType = OptionType::find()->all();

        return $this->render('create', [
                    'model'      => $model,
                    'optionType' => $optionType,
        ]);
    }

    /**
     * Updates an existing SiteOption model.
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

        $optionType = OptionType::find()->all();

        return $this->render('update', [
                    'model'      => $model,
                    'optionType' => $optionType,
        ]);
    }

    /**
     * Deletes an existing SiteOption model.
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
     * Finds the SiteOption model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SiteOption the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel ($id)
    {
        if (($model = SiteOption::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
