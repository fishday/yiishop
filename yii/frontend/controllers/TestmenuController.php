<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Test;

class TestmenuController extends Controller
{
    public $layout = 'testmenu';


    public function actionIndex()
    {
        $searchModel = new Test();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        echo 'dataProvider: ';
        print_r($dataProvider);
        echo '<br>';
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
    }
}
?>