<?php

use yii\helpers\Html;

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 hidden-xs">

                <a href="<?= \yii\helpers\Url::toRoute(['/']) ?>">
                    <?= Html::img('@web/theme/images/brandlogo.png', ['alt' => 'GoodLifon', 'class' =>'img-responsive header-logo']) ?>
                </a>
        </div>
        <div class="col-xs-6 col-sm-3">
            <h3>Contact</h3>
        </div>
        <div class="col-xs-6 col-sm-3">
            <h3>Grafik</h3>
        </div>
        <div class="col-sm-3 hidden-xs">
            <h3>Korzina</h3>
        </div>
    </div>
</div>
