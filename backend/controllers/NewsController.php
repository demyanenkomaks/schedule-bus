<?php

namespace backend\controllers;

use Imagine\Image\Box;
use Imagine\Image\Point;
use Yii;
use backend\models\News;
use backend\models\NewsSearch;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();

        if ($model->load(Yii::$app->request->post())) {
            $model->url = $model->translit($model->title);
            $model->user_created = Yii::$app->user->identity->id;
            $model->user_updated = Yii::$app->user->identity->id;

            if ($model->save()) {

                if (!empty(UploadedFile::getInstance($model, 'img'))){
                    $size_imd = 200;
                    $directory = Yii::getAlias('@frontend/web/img-news/');
                    if (!is_dir($directory)) {
                        FileHelper::createDirectory($directory);
                    }

                    $directory_200x = Yii::getAlias('@frontend/web/img-news/' . $size_imd . 'x_/');
                    if (!is_dir($directory_200x)) {
                        FileHelper::createDirectory($directory_200x);
                    }

                    $file = UploadedFile::getInstances($model, 'img')[0];
                    $model->img = $model->id . '.' . $file->extension;

                    $file->saveAs( Yii::getAlias('@frontend/web/img-news/') . $model->img);

                    Image::thumbnail('@frontend/web/img-news/' . $model->img, $size_imd, $size_imd)
                        ->save(Yii::getAlias('@frontend/web/img-news/' . $size_imd . 'x_/' . $model->img), ['quality' => 80]);

                    $model->save();
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->url = $model->translit($model->title);
            $model->user_updated = Yii::$app->user->identity->id;

            if (!empty(UploadedFile::getInstance($model, 'img'))){
                $size_imd = 200;
                $directory = Yii::getAlias('@frontend/web/img-news/');
                if (!is_dir($directory)) {
                    FileHelper::createDirectory($directory);
                }

                $directory_200x = Yii::getAlias('@frontend/web/img-news/' . $size_imd . 'x_/');
                if (!is_dir($directory_200x)) {
                    FileHelper::createDirectory($directory_200x);
                }

                $file = UploadedFile::getInstances($model, 'img')[0];
                $model->img = $model->id . '.' . $file->extension;

                $file->saveAs( Yii::getAlias('@frontend/web/img-news/') . $model->img);

                Image::thumbnail('@frontend/web/img-news/' . $model->img, $size_imd, $size_imd)
                    ->save(Yii::getAlias('@frontend/web/img-news/' . $size_imd . 'x_/' . $model->img), ['quality' => 80]);

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
     * Deletes an existing News model.
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
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
