<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Меню';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'lft',
            'rgt',
            'depth',
            'url',
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Создать пункт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::end(); ?>


</div>
