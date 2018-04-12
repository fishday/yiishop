<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<pre><?php print_r($model->errors); ?></pre>
<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rootLevel')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Menu::find()->all(), 'id', 'name')) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
