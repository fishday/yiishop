<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-view">

    <h1><?= Html::encode($this->title) ?></h1>

</div>
    <?= $model->name ?>
<!--    --><?//= Yii::$app->user->identity->username ?>
<!--    --><?php
//    if (\Yii::$app->user->can('updatePost', ['author_id' =>$model->user_id]));
//    ?>
<!--    <p>-->
<!--        --><?//= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Delete', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
<!--    </p>-->
<!---->
<!--    --><?//= DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'id',
//            'title',
//            'text:ntext',
//            'url:url',
//            'status_id',
//            'sort',
//            'author.username',
//            'author.email',
//            'tagsAsString',
//            'smallImage:image'
//        ],
//    ]) ?>
<!---->
<!---->
<!--    --><?php
//    $fotorama = \metalguardian\fotorama\Fotorama::begin(
//        [
//            'options' => [
//                'loop' => true,
//                'hash' => true,
//                'ratio' => 800/600,
//            ],
//            'spinner' => [
//                'lines' => 20,
//            ],
//            'tagName' => 'span',
//            'useHtmlData' => false,
//            'htmlOptions' => [
//                'class' => 'custom-class',
//                'id' => 'custom-id',
//            ],
//        ]
//    );
//
//    foreach ($model->images as $one)
//    {
//        echo Html::img($one->imageUrl, ['alt'=>$one->alt]);
//    }
//    $fotorama->end();
//    ?>
<!--</div>-->
