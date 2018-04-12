<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Menu;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class TestController extends Controller
{
    public function actionIndex()
    {
        echo 'TEST';
        echo '<br>';
        $countries = new Menu(['name' => 'Countries']);

        echo 'countries: ';
        print_r($countries);
        echo '<br>';

        $countries->makeRoot();
//        return $this->render('index');
    }

}
