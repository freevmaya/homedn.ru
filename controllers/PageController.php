<?php

namespace app\controllers;

use Yii;
use app\models\Page;
use app\models\PageSeo;
use app\models\PageType;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Template;
use app\models\PageOptionValue;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends Controller
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
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex ($page_type = false)
    {
        if ($page_type) {
            $dataProvider = new ActiveDataProvider([
                'query' => Page::find()->joinWith('pageType pt', false, 'INNER JOIN')->where([ 'pt.code' => $page_type ]),
            ]);
        } else {
            $dataProvider = new ActiveDataProvider([
                'query' => Page::find(),
            ]);
        }

        $pageType = PageType::find()->where([ 'code' => $page_type ])->one();

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'pageType'     => $pageType ?: false,
        ]);
    }

    /**
     * Displays a single Page model.
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
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate ($page_type = false)
    {
        $model    = new Page();
        $modelSeo = new PageSeo();

        $pageType            = $page_type ? PageType::find()->where([ 'code' => $page_type ])->one() : null;
        $model->page_type_id = $pageType ? $pageType->id : null;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $modelSeo->page_id = $model->id;
            $modelSeo->save();
            return $this->redirect([ 'view', 'id' => $model->id ]);
        }

        $parent   = Page::find()->all();
        $template = Template::find()->all();

        return $this->render('create', [
                    'model'    => $model,
                    'modelSeo' => $modelSeo,
                    'pageType' => $pageType,
                    'parent'   => $parent,
                    'template' => $template,
        ]);
    }

    /**
     * Updates an existing Page model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate ($id)
    {
        $model = $this->findModel($id);
        if ($model && $model->pageSeo) {
            $modelSeo = $model->pageSeo;
        } else {
            $modelSeo          = new PageSeo();
            $modelSeo->page_id = $model->id;
            $modelSeo->save();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save() && $modelSeo->load(Yii::$app->request->post()) && $modelSeo->save()) {

            if (($model->template && ($pageOptions = $model->template->pageOptions)) || ($model->pageType->template && ($pageOptions = $model->pageType->template->pageOptions))) {
                foreach ($pageOptions as $opt) {
                    if (isset(Yii::$app->request->post()[$opt->code])) {
                        if (!($pageOptionValue = PageOptionValue::find()->where([ 'page_option_id' => $opt->id, 'page_id' => $id ])->one())) {
                            $pageOptionValue                 = new PageOptionValue();
                            $pageOptionValue->page_id        = $id;
                            $pageOptionValue->page_option_id = $opt->id;
                        }
                        $pageOptionValue->value = Yii::$app->request->post()[$opt->code];
                        $pageOptionValue->save();
                    }
                }
            }

            return $this->redirect([ 'view', 'id' => $model->id ]);
        }

        $pageType = PageType::find()->where([ 'id' => $model->page_type_id ])->one();
        $parent   = Page::find()->where([ 'not', [ 'id' => $id ] ])->all();
        $template = Template::find()->all();

        return $this->render('update', [
                    'model'    => $model,
                    'modelSeo' => $modelSeo,
                    'pageType' => $pageType,
                    'parent'   => $parent,
                    'template' => $template,
        ]);
    }

    /**
     * Deletes an existing Page model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete ($id)
    {
        $model     = $this->findModel($id);
        $page_type = $model->pageType->code;
        $model->delete();

        return $this->redirect([ 'index', 'page_type' => $page_type ]);
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel ($id)
    {
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
