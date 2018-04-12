<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property string $id
 * @property string $category_id
 * @property string $name
 * @property string $description
 * @property string $price
 * @property string $image
 * @property int $status
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'description', 'price', 'image'], 'required'],
            [['category_id', 'status'], 'integer'],
            [['price'], 'number'],
            [['name', 'image'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'image' => 'Image',
            'status' => 'Status',
        ];
    }
    public function getCategory()
    {
        $categories = Category::find()->andWhere(['root' => '1'])->orderBy(['lft' => SORT_ASC])->asArray()->all();
        foreach ($categories as $cat)
        {
            if ($cat['lvl'] == 0)
            {
                $cat2[] = $this->createTree2($categories, $cat['root'], $cat['lft']);
            }
        }
        return $cat2;
    }

//    private function createTree($category, $left = 0, $right = null) {
//        $tree = array();
//        foreach ($category as $cat => $range) {
//            if ($range['lft'] == $left + 1 && (is_null($right) || $range['rgt'] < $right)) {
//                $tree[$cat] = $this->createTree($category, $range['lft'], $range['rgt']);
//                $left = $range['rgt'];
//            }
//        }
//        return $tree;
//    }

    private function createTree2($category, $root, $left = 0, $right = null) {
        $tree = [];
        foreach ($category as $cat => $range) {
            if ($range['lft'] == $left + 1 && (is_null($right) || $range['rgt'] < $right) && $range['root'] == $root) {
                $tree[$cat]= array();
                $tree[$cat]['name']=$range['name'];
                if($range['rgt']-$range['lft']>1){
                    $tree[$cat]['sub'] = $this->createTree2($category, $root, $range['lft'], $range['rgt']);
                }
                $left = $range['rgt'];
            }
        }
//        $tree[$left]['name'] = $category[$left]['name'];
        return $tree;
    }
}
