<?php
namespace common\models;

use creocoder\nestedsets\NestedSetsBehavior;

class Menu extends \yii\db\ActiveRecord
{
    public $rootLevel;

    public static function tableName()
    {
        return 'menu';
    }

    public function rules()
    {
        return [
            [['name', 'url'], 'required'],
            [['lft', 'rgt', 'depth', 'rootLevel'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['url'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 1000],
            [['lft', 'rgt', 'depth'], 'safe'],
        ];
    }

    public function behaviors() {
        return [
            'tree' => [
                'class' => NestedSetsBehavior::className(),
                // 'treeAttribute' => 'tree',
                // 'leftAttribute' => 'lft',
                // 'rightAttribute' => 'rgt',
                // 'depthAttribute' => 'depth',
            ],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public static function find()
    {
        return new MenuQuery(get_called_class());
    }

//    public function beforeSave($insert)
//    {
//        echo 'rl: ';
//        print_r($this->rootLevel);
//        echo '<br>';
//
//        if (parent::beforeSave($insert))
//        {
//            if ($this->rootLevel == null)
//            {
//                $this->makeRoot();
//            }
//            else
//            {
//                $parent = self::find()->andWhere(['id' => $this->rootLevel])->one();
//            }
//        }
//        else
//        {
//            return false;
//        }
//    }
}

//class Menu extends \yii\db\ActiveRecord
//{
//    public $rootLevel;
//
//    public static function tableName()
//    {
//        return 'menu';
//    }
//
//    public function behaviors() {
//        return [
//            'tree' => [
//                'class' => NestedSetsBehavior::className(),
//            ],
//        ];
//    }
//
//    public function rules()
//    {
//        return [
//            [['name', 'url'], 'required'],
//            [['lft', 'rgt', 'depth'], 'integer'],
//            [['name'], 'string', 'max' => 255],
//            [['url'], 'string', 'max' => 100],
//            [['description'], 'string', 'max' => 1000],
//            [['lft', 'rgt', 'depth'], 'safe'],
//        ];
//    }
//
//    public function transactions()
//    {
//        return [
//            self::SCENARIO_DEFAULT => self::OP_ALL,
//        ];
//    }
//
//    public static function find()
//    {
//        return new MenuQuery(get_called_class());
//    }
//}