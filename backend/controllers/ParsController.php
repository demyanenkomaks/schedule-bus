<?php
namespace backend\controllers;

use backend\models\ExcelForm;
use backend\models\Flights;
use backend\models\RouteSchedule;
use backend\models\Station;
use yii\filters\VerbFilter;
use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * SpWagonFactoryController implements the CRUD actions for SpWagonFactory model.
 */
class ParsController extends Controller
{
    /**
     * @inheritdoc
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


//    public function actionIndex()
//    {
//        $i = 1;
//        $dir = Yii::getAlias('@backend/web/xlsx/');
//
//        $spreadsheet = IOFactory::load($dir . '1.xlsx');
//        $sheet = $spreadsheet->getActiveSheet();
//
//        $route_num  = removeExcess($sheet->getCell('A1')->getValue());
//
//        debug($route_num);
//
//        $modelRoute = RouteSchedule::find()->where(['flight' => $route_num])->one();
//
//        $row = 3;
//        while ($row <= $sheet->getHighestRow()) {
//            $id_statin = null;
//            $station = trim($sheet->getCell('A' . $row)->getValue());
//
//            $stationSearchTitle = removeExcess(stristr($station, '(', true));
//            $stationSearchAddress = removeExcess(stristr($station, '('));
//            $stationSearchAddress = preg_replace('/\(|\)/', '', $stationSearchAddress);
//
//            $modelStationSearchTitle = Station::find()
//                ->where(['title' => $stationSearchTitle])
//                ->one();
//
//            if (empty($modelStationSearchTitle)) {
//                $modelNewStation = New Station();
//                $modelNewStation->title = $stationSearchTitle;
//                $modelNewStation->address = $stationSearchAddress;
//                $modelNewStation->save();
//
//                $id_statin = $modelNewStation->id;
//            } else {
//                $id_statin = $modelStationSearchTitle->id;
//            }
//
//            $modelFlights = new Flights();
//            $modelFlights->id_route = $modelRoute->id;
//            $modelFlights->id_station = $id_statin;
//            $modelFlights->order = $i;
//
//            debug($modelFlights->save());
//
//            $row++;
//            $i++;
//        }
//    }

//    public function actionSchedule()
//    {
//        $dir = Yii::getAlias('@backend/web/xlsx/');
//
//        $spreadsheet = IOFactory::load($dir . '1.xlsx');
//
//        $sheet = $spreadsheet->getActiveSheet();
//
//        $row = 4;
//        while ($row <= $sheet->getHighestRow()) {
//
//            $model = new RouteSchedule();
//
//            $model->otpr = str_replace("-",":", removeExcess($sheet->getCell('A' . $row)->getValue()));
//            $model->prib = str_replace("-",":", removeExcess($sheet->getCell('B' . $row)->getValue()));
//            $model->flight = removeExcess($sheet->getCell('C' . $row)->getValue());
//            $model->route = removeExcess($sheet->getCell('D' . $row)->getValue());
//            $model->car_model = removeExcess($sheet->getCell('E' . $row)->getValue());
//            $model->capacity = removeExcess($sheet->getCell('F' . $row)->getValue());
//            $model->periodicity = removeExcess($sheet->getCell('G' . $row)->getValue());
//            $model->carrier = removeExcess($sheet->getCell('H' . $row)->getValue());
//
////            debug($model);
//            debug($model->save());
//
//            $row++;
//        }
//
//    }



}
