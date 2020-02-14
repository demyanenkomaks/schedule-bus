<?php

namespace backend\controllers;

use backend\models\AuthAssignment;
use Yii;
use backend\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $authassignment = new AuthAssignment();

        if ($model->load(Yii::$app->request->post()) && $authassignment->load(Yii::$app->request->post())) {
            $model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($model->password_hash);
            $model->auth_key = Yii::$app->security->generateRandomString();

            $transaction = Yii::$app->db->beginTransaction();
            try {
                if (!($flag = $model->save())) {
                    $transaction->rollBack();
                }

                $authassignment->user_id = strval($model->id);

                if (!($flag = $authassignment->save())) {
                    $transaction->rollBack();
                }
                if ($flag) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
            }
        }

        return $this->render('create', [
            'model' => $model,
            'authassignment' => $authassignment,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $authassignment = $this->findModelAuthassignment($id);

        if ($model->load(Yii::$app->request->post()) && $authassignment->load(Yii::$app->request->post())) {

            if ($model->password_hash != '********'){
                $model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($model->password_hash);
            } else {
                $model->password_hash = $model->getOldAttribute('password_hash');
            }

            $transaction = Yii::$app->db->beginTransaction();
            try {
                if (!($flag = $model->save())) {
                    $transaction->rollBack();
                }

                if (!($flag = $authassignment->save())) {
                    $transaction->rollBack();
                }

                if ($flag) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
            }
        }

        return $this->render('update', [
            'model' => $model,
            'authassignment' => $authassignment,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelAuthassignment($user_id)
    {
        if (($authassignment = authassignment::findone(['user_id' => $user_id])) !== null) {
            return $authassignment;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
