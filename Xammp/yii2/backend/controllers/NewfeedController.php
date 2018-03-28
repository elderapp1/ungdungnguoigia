<?php

namespace backend\controllers;

use Yii;
use app\models\Newfeed;
use app\models\Newfeed_Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Newfeed_Controller implements the CRUD actions for Newfeed model.
 */
class NewfeedController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Newfeed models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Newfeed_Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Newfeed model.
     * @param integer $id_newfeed
     * @param integer $id_user
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_newfeed, $id_user)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_newfeed, $id_user),
        ]);
    }

    /**
     * Creates a new Newfeed model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Newfeed();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_newfeed' => $model->id_newfeed, 'id_user' => $model->id_user]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Newfeed model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_newfeed
     * @param integer $id_user
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_newfeed, $id_user)
    {
        $model = $this->findModel($id_newfeed, $id_user);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_newfeed' => $model->id_newfeed, 'id_user' => $model->id_user]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Newfeed model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_newfeed
     * @param integer $id_user
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_newfeed, $id_user)
    {
        $this->findModel($id_newfeed, $id_user)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Newfeed model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_newfeed
     * @param integer $id_user
     * @return Newfeed the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_newfeed, $id_user)
    {
        if (($model = Newfeed::findOne(['id_newfeed' => $id_newfeed, 'id_user' => $id_user])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
