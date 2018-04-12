<?php

namespace common\models;

use Yii;

class Category extends \kartik\tree\models\Tree
{
    public static function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        $rules = parent::rules();
        return $rules;
    }

    /**
     * Override isDisabled method if you need as shown in the
     * example below. You can override similarly other methods
     * like isActive, isMovable etc.
     */
//    public function isDisabled()
//    {
//        if (Yii::$app->user->username !== 'admin') {
//            return true;
//        }
//        return parent::isDisabled();
//    }


}