<?php

namespace backend\controllers;

use Yii;
use backend\models\Partners;
use backend\models\PartnersSearch;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PartnersController implements the CRUD actions for Partners model.
 */
class PartnersController extends Controller
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
     * Lists all Partners models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PartnersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Partners model.
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
     * Creates a new Partners model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Partners();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {

                if (!empty(UploadedFile::getInstance($model, 'img'))){
                    $size_imd = 200;
                    $directory = Yii::getAlias('@frontend/web/logo_partners/');
                    if (!is_dir($directory)) {
                        FileHelper::createDirectory($directory);
                    }

                    $directory_200x = Yii::getAlias('@frontend/web/logo_partners/' . $size_imd . 'x_/');
                    if (!is_dir($directory_200x)) {
                        FileHelper::createDirectory($directory_200x);
                    }

                    $file = UploadedFile::getInstances($model, 'img')[0];
                    $model->img = $model->id . '.' . $file->extension;

                    $file->saveAs( Yii::getAlias('@frontend/web/logo_partners/') . $model->img);

                    Image::thumbnail('@frontend/web/logo_partners/' . $model->img, $size_imd, $size_imd)
                        ->save(Yii::getAlias('@frontend/web/logo_partners/' . $size_imd . 'x_/' . $model->img), ['quality' => 80]);

                    $model->save();
                } else {
                    $model->img = $model->getOldAttribute('img');
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Partners model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            if (!empty(UploadedFile::getInstance($model, 'img'))){
                $size_imd = 200;
                $directory = Yii::getAlias('@frontend/web/logo_partners/');
                if (!is_dir($directory)) {
                    FileHelper::createDirectory($directory);
                }

                $directory_200x = Yii::getAlias('@frontend/web/logo_partners/' . $size_imd . 'x_/');
                if (!is_dir($directory_200x)) {
                    FileHelper::createDirectory($directory_200x);
                }

                $file = UploadedFile::getInstances($model, 'img')[0];
                $model->img = $model->id . '.' . $file->extension;

                $file->saveAs( Yii::getAlias('@frontend/web/logo_partners/') . $model->img);

                Image::thumbnail('@frontend/web/logo_partners/' . $model->img, $size_imd, $size_imd)
                    ->save(Yii::getAlias('@frontend/web/logo_partners/' . $size_imd . 'x_/' . $model->img), ['quality' => 80]);

            } else {
                $model->img = $model->getOldAttribute('img');
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Partners model.
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
     * Finds the Partners model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Partners the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Partners::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
