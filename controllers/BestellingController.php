<?php

namespace app\controllers;
//Abdullah Alibaks
use app\models\Bestelling;
use app\models\BestellingSearch;
use app\models\Menu;
use app\models\Medewerkers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BestellingController implements the CRUD actions for Bestelling model.
 */
class BestellingController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Bestelling models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $medewerkers = Medewerkers::find()->all();
        $menu = Menu::find()->all();
        $searchModel = new BestellingSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'medewerkers' => $medewerkers,
            'menu' => $menu,
        ]);
    }

    /**
     * Displays a single Bestelling model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bestelling model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        //Abdullah Alibaks
        $model = new Bestelling();
        $medewerkers = Medewerkers::find()->all();
        $menu = Menu::find()->all();
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'medewerkers' => $medewerkers,
            'menu' => $menu,
        ]);
    }

    /**
     * Updates an existing Bestelling model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {   
        //Abdullah Alibaks
        $model = $this->findModel($id);
        $medewerkers = Medewerkers::find()->all();
        $menu = Menu::find()->all();
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'medewerkers' => $medewerkers,
            'menu' => $menu,
        ]);
    }

    /**
     * Deletes an existing Bestelling model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

  
    /**
     * Finds the Bestelling model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Bestelling the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bestelling::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
