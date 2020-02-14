<?php

namespace backend\controllers;

use backend\models\Flights;
use backend\models\FlightsSearch;
use backend\models\Station;
use Yii;
use backend\models\RouteSchedule;
use backend\models\RouteScheduleSearch;
use backend\models\Model;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * RouteScheduleController implements the CRUD actions for RouteSchedule model.
 */
class RouteScheduleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all RouteSchedule models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RouteScheduleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RouteSchedule model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $searchModel = new FlightsSearch();
        $searchModel->id_route = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new RouteSchedule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RouteSchedule();
        $model->otpr = '00:00';
        $model->prib = '00:00';

        if ($model->load(Yii::$app->request->post())) {
            if (!empty(UploadedFile::getInstance($model, 'url_pdf'))){
                $directory = Yii::getAlias('@frontend/web/pdf/');
                if (!is_dir($directory)) {
                    FileHelper::createDirectory($directory);
                }
                $path = '/pdf/';

                $file = UploadedFile::getInstances($model, 'url_pdf')[0];
                $file_name = $path . $file->name;

                $model->url_pdf = $file_name;
                $file->saveAs(Yii::getAlias('@frontend/web') . $file_name);
            } else {
                $model->url_pdf = $model->getOldAttribute('url_pdf');
            }

            if (!empty(UploadedFile::getInstance($model, 'file_bus'))){
                $directory = Yii::getAlias('@frontend/web/foto_bus/');
                if (!is_dir($directory)) {
                    FileHelper::createDirectory($directory);
                }
                $path = '/foto_bus/';

                $file = UploadedFile::getInstances($model, 'file_bus')[0];
                $file_name = $path . $file->name;

                $model->file_bus = $file_name;
                $file->saveAs(Yii::getAlias('@frontend/web') . $file_name);
            } else {
                $model->file_bus = $model->getOldAttribute('file_bus');
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RouteSchedule model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if (!empty(UploadedFile::getInstance($model, 'url_pdf'))){
                $directory = Yii::getAlias('@frontend/web/pdf/');
                if (!is_dir($directory)) {
                    FileHelper::createDirectory($directory);
                }
                $path = '/pdf/';

                $file = UploadedFile::getInstances($model, 'url_pdf')[0];
                $file_name = $path . $file->name;

                $model->url_pdf = $file_name;
                $file->saveAs(Yii::getAlias('@frontend/web') . $file_name);
            } else {
                $model->url_pdf = $model->getOldAttribute('url_pdf');
            }

            if (!empty(UploadedFile::getInstance($model, 'file_bus'))){
                $directory = Yii::getAlias('@frontend/web/foto_bus/');
                if (!is_dir($directory)) {
                    FileHelper::createDirectory($directory);
                }
                $path = '/foto_bus/';

                $file = UploadedFile::getInstances($model, 'file_bus')[0];
                $file_name = $path . $file->name;

                $model->file_bus = $file_name;
                $file->saveAs(Yii::getAlias('@frontend/web') . $file_name);
            } else {
                $model->file_bus = $model->getOldAttribute('file_bus');
            }



            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUpdateFlights($id)
    {
        $model = RouteSchedule::find()->where(['id' => $id])->one();

        $stationList = ArrayHelper::map(Station::find()->orderBy('title')->all(),'id', function($data) {
            return $data->title . ' (' . $data->address . ')';
        });

        $models_flights = Flights::find()->where(['id_route' => $id])->orderBy(['order' => SORT_ASC])->all();
        if(empty($models_flights))
            $models_flights = [new Flights()];

        if (Yii::$app->request->post()) {
            $oldIDs = ArrayHelper::map($models_flights, 'id', 'id');
            $models_flights = Model::createMultiple(Flights::class, $models_flights);

            Model::loadMultiple($models_flights, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($models_flights, 'id', 'id')));

            if (Model::validateMultiple($models_flights)) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if (!empty($deletedIDs)) {
                        Flights::deleteAll(['id' => $deletedIDs]);
                    }
                    foreach ($models_flights as $flights) {
                        $flights->id_route = $id;

                        if (!($flag = $flights->save(false))) {
                            $transaction->rollBack();
                            break;
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $id]);
                    }
                } catch (\Exception $e) {
                    $transaction->rollBack();
                }
            }

        }

        return $this->render('flights/update', [
            'model' => $model,
            'models_flights' => $models_flights,
            'stationList' => $stationList,
        ]);
    }

    /**
     * Deletes an existing RouteSchedule model.
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
     * Finds the RouteSchedule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RouteSchedule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RouteSchedule::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
