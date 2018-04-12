<?php
use kartik\tree\TreeView;
use common\models\Category;

echo TreeView::widget([
    // single query fetch to render the tree
    // use the Product model you have in the previous step
    'query' => Category::find()->addOrderBy('root, lft'),
    'headingOptions' => ['label' => 'Categories'],
    'fontAwesome' => false,     // optional
    'isAdmin' => true,         // optional (toggle to enable admin mode)
    'displayValue' => 1,        // initial display value
    'softDelete' => true,       // defaults to true
    'cacheSettings' => [
        'enableCache' => false   // defaults to true
    ],
]);