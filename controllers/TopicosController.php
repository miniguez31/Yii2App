<?php

namespace app\controllers;

use Yii;
use app\models\Topicos;
use app\models\TopicosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TopicosController implements the CRUD actions for Topicos model.
 */
class TopicosController extends Controller
{
    /**
     * {@inheritdoc}
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
            'access' => [
                'class'=> AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['create', 'update', 'delete', 'index'],
                        'allow' => true,//$usuario->tipo == "admin"
                        'roles' => ['@']
                    ],                    
                ]
            ]
        ];
    }

    /**
     * Lists all Topicos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TopicosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Topicos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Topicos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Topicos();

        if ($model->load(Yii::$app->request->post()) ) {

            $model->idUsuario = Yii::$app->session['idUsuario'];
            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::t("app", "Topic created"));
                return $this->redirect('index');
            } else {
                var_dump($model->getErrors()); die;
                Yii::$app->session->setFlash('error', Yii::t("app", "Topic cannot be created"));
            }            
            //return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Topicos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if (Yii::$app->session['idUsuario'] != $model->idUsuario) {
            Yii::$app->session->setFlash('error', Yii::t("app", "Topic cannot be updated"));
            return $this->redirect('index');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t("app", "Topic updated"));
            return $this->redirect('index');
            //return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Topicos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->session['idUsuario'] == $model->idUsuario) {
            $model->delete();
            Yii::$app->session->setFlash('success', Yii::t("app", "Topic deleted"));    
        } else {
            Yii::$app->session->setFlash('error', Yii::t("app", "Topic cannot be deleted"));
        }
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the Topicos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Topicos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Topicos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
