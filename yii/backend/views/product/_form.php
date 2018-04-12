<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */

//print_r($model->Category);
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->textInput(['maxlength' => true]) ?>
<!--    --><?//= $form->field($model, 'category_id')->dropDownList(['Телевизоры' => ['0' => ['Samsung' => 1, 'Sony' => 2], '1' => 'LG']],['prompt' => 'Выберите категорию товара']) ?>
<!--    --><?//= $form->field($model, 'category_id')->dropDownList($model->Category,['prompt' => 'Выберите категорию товара']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList([1 => 'Включить отображение', 0 => 'Отключить отображение'] , ['prompt' => 'выберите отображение']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
