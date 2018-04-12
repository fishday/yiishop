<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class Test extends Menu
{
    public function search($params)
    {
        $query = Menu::find();
        echo 'query: ';
        print_r($query);
        echo '<br>';
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],

        ]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        return $dataProvider;
    }
}