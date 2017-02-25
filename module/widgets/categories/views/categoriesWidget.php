


<?php
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
//use kartik\nav\NavX;


NavBar::begin([


    'options' => [

        'class' => 'navbar-default',

    ],

]);

echo Nav::widget([

    'items' => $tree,
    'options' => [
        'class' => 'navbar-nav'
    ],
]);

NavBar::end();

//debug($tree);
?>







