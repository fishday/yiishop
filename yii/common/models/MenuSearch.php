<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
//use common\models\Menu;

class MenuSearch extends Menu
{
    public function rules()
    {
        return [
//            [['id'], 'integer'],
//            [['second'], 'string'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Menu::find();
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

//        $query->andFilterWhere(['id' => $this->id]);
//
//        $query->andFilterWhere(['like', 'second', $this->second]);

        return $dataProvider;
    }
}
