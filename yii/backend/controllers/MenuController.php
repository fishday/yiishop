<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Menu;
use common\models\MenuSearch;


class MenuController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new MenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        echo '<br>';echo '<br>';echo '<br>';
//        echo 'dataProvider: ';
//        print_r($dataProvider);
//        echo '<br>';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    public function actionAdd()
    {
        $model = new Menu();
        $model->second = 'Тестим';
        $model->save();

//        return $this->render('index');
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        $model = new Menu();
        if ($model->load(Yii::$app->request->post()))
        {
            if ($model->rootLevel == null)
            {
                $model->makeRoot();
            }
            else
            {
                $parent = Menu::find()->andWhere(['id' => $model->rootLevel])->one();
                $model->prependTo($parent);
            }
            if ($model->save())
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    private function findModel($id)
    {
        // if (($model = Blog::findOne($id)) !== null) {
        //     return $model;
        // }
        if (($model = Menu::find()->andWhere(['id' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}