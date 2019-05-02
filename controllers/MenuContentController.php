<?php

namespace app\controllers;

use Yii;
use app\models\MenuContent;
use app\models\Page;
use app\models\Menu;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * MenuContentController implements the CRUD actions for MenuContent model.
 */
class MenuContentController extends Controller
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
     * Lists all MenuContent models.
     * @return mixed
     */
    public function actionIndex ($menu_id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => MenuContent::find()->where([ 'menu_id' => $menu_id ]),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'menu_id'      => $menu_id,
                    'menu_item'    => Menu::find()->where([ 'id' => $menu_id ])->one(),
        ]);
    }

    /**
     * Displays a single MenuContent model.
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
     * Creates a new MenuContent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate ($menu_id)
    {
        $model = new MenuContent();

        $model->menu_id = $menu_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->page_id) {
                $model->url = Url::to([ 'site/frontend', 'id' => $model->page_id ]);
                $model->save();
            }
            return $this->redirect([ 'view', 'id' => $model->id ]);
        }

        $page   = Page::find()->all();
        $parent = MenuContent::find()->where([ 'menu_id' => $menu_id ])->all();

        return $this->render('create', [
                    'model'  => $model,
                    'page'   => $page,
                    'parent' => $parent,
        ]);
    }

    /**
     * Updates an existing MenuContent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate ($id, $menu_id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->page_id) {
                $model->url = Url::to([ 'site/frontend', 'id' => $model->page_id ]);
                $model->save();
            }
            return $this->redirect([ 'view', 'id' => $model->id ]);
        }

        $page   = Page::find()->all();
        $parent = MenuContent::find()->where([ 'menu_id' => $menu_id ])->andWhere([ 'not', [ 'id' => $id ] ])->all();

        return $this->render('update', [
                    'model'  => $model,
                    'page'   => $page,
                    'parent' => $parent,
        ]);
    }

    /**
     * Deletes an existing MenuContent model.
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
     * Finds the MenuContent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MenuContent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel ($id)
    {
        if (($model = MenuContent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
