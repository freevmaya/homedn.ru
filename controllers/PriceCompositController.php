<?php

namespace app\controllers;

use Yii;
use app\models\PriceComposit;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\PriceOption;
use app\models\PriceElement;
use app\models\PriceCaption;

/**
 * PriceCompositController implements the CRUD actions for PriceComposit model.
 */
class PriceCompositController extends Controller
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
     * Lists all PriceComposit models.
     * @return mixed
     */
    public function actionIndex ($price_caption_id)
    {
        $priceComposit = PriceComposit::find()
                ->joinWith([ 'priceOption po', 'priceElement pe' ], false, 'INNER JOIN')
                ->where([ 'po.price_caption_id' => $price_caption_id, 'pe.price_caption_id' => $price_caption_id ])
                ->orderBy([ 'pe.sort' => SORT_ASC, 'po.sort' => SORT_ASC ])
                ->all();

        if (Yii::$app->request->isPost) {
            $postComposit = Yii::$app->request->post()['composit'];
            foreach ($priceComposit as $composit) {
                $composit->delete();
            }
            foreach ($postComposit as $optionId => $element) {
                foreach ($element as $elementId => $flag) {
                    $pc                   = new PriceComposit();
                    $pc->price_option_id  = $optionId;
                    $pc->price_element_id = $elementId;
                    $pc->save();
                }
            }
            return $this->redirect([ 'index', 'price_caption_id' => $price_caption_id ]);
        }

        $priceOption = PriceOption::find()
                ->where([ 'price_caption_id' => $price_caption_id ])
                ->orderBy([ 'sort' => SORT_ASC ])
                ->all();

        $priceElement = PriceElement::find()
                ->where([ 'price_caption_id' => $price_caption_id ])
                ->orderBy([ 'sort' => SORT_ASC ])
                ->all();

        $priceCaption = PriceCaption::find()->where([ 'id' => $price_caption_id ])->one();

        $composit = [];
        foreach ($priceComposit as $element) {
            if (isset($composit[$element->price_option_id])) {
                $composit[$element->price_option_id][$element->price_element_id] = 1;
            } else {
                $composit[$element->price_option_id] = [ $element->price_element_id => 1 ];
            }
        }

        return $this->render('index', [
                    'priceComposit' => $priceComposit,
                    'priceOption'   => $priceOption,
                    'priceElement'  => $priceElement,
                    'priceCaption'  => $priceCaption,
                    'composit'      => $composit,
        ]);
    }

    /**
     * Displays a single PriceComposit model.
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
     * Creates a new PriceComposit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate ()
    {
        $model = new PriceComposit();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([ 'view', 'id' => $model->id ]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing PriceComposit model.
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
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PriceComposit model.
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
     * Finds the PriceComposit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PriceComposit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel ($id)
    {
        if (($model = PriceComposit::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
