<?php

namespace backend\controllers;

use Yii;
use app\models\Game1;
use app\models\Game1_Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Game1_Controller implements the CRUD actions for Game1 model.
 */
class Game1Controller extends Controller
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
     * Lists all Game1 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Game1_Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Game1 model.
     * @param integer $id_question
     * @param integer $id_user
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_question, $id_user)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_question, $id_user),
        ]);
    }

    /**
     * Creates a new Game1 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Game1();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_question' => $model->id_question, 'id_user' => $model->id_user]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Game1 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_question
     * @param integer $id_user
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_question, $id_user)
    {
        $model = $this->findModel($id_question, $id_user);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_question' => $model->id_question, 'id_user' => $model->id_user]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Game1 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_question
     * @param integer $id_user
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_question, $id_user)
    {
        $this->findModel($id_question, $id_user)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Game1 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_question
     * @param integer $id_user
     * @return Game1 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_question, $id_user)
    {
        if (($model = Game1::findOne(['id_question' => $id_question, 'id_user' => $id_user])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
