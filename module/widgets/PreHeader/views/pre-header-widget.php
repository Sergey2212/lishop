<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\icons\Icon;
use app\modules\shop\models\Wishlist;
/** @var yii\web\View $this */
/**
 * @var \app\modules\shop\models\Order $order
 */
/** @var bool $collapseOnSmallScreen */
/** @var bool $useFontAwesome */
/** @var \app\extensions\DefaultTheme\Module $theme */

$mainCurrency = \app\modules\shop\models\Currency::getMainCurrency();
if (is_null($order)) {
    $itemsCount = 0;
} else {
    $itemsCount = $order->items_count;
}

$navStyles = '';

?>

    <div class="pre-header one-row-header-with-cart">
    <div class="container">
        <div class="row">

            <ul class="col-sm-4 col-md-3 top-panel-ul">
                <li>
                    <a href="<?= \yii\helpers\Url::toRoute(['/about']) ?>">О нас</a>
                </li>
                <li>
                    <a href="<?= \yii\helpers\Url::toRoute(['/delivery']) ?>">Доставка</a>
                </li>
                <li>
                    <a href="<?= \yii\helpers\Url::toRoute(['/payment']) ?>">Оплата</a>
                </li>
            </ul>

            <div class="col-sm-8 col-md-9 top-panel-div">

                <div class="pull-right personal-area">

                        <?php if (Yii::$app->user->isGuest === true): ?>

                            <a href="<?= \yii\helpers\Url::toRoute(['/user/user/login']) ?>" class="btn btn-login">
                                <i class="glyphicon glyphicon-user login-icon"></i>
                                <span id="a-ligin">Вход</span>
                            </a>

                        <?php else: ?>
                            <?= Yii::t('app', 'Hi') ?>,
                            <span class="dropdown">
                    <a href="<?= \yii\helpers\Url::toRoute(['/shop/cabinet']) ?>" class="link-cabinet" data-toggle="dropdown" data-hover="dropdown"><?= Html::encode(Yii::$app->user->identity->username) ?></a>!
                                <?= \yii\widgets\Menu::widget([
                                    'items' => [
                                        [
                                            'label' => Yii::t('app', 'User profile'),
                                            'url' => ['/user/user/profile'],
                                            [
                                                'class' => 'user-profile-link',
                                            ]
                                        ],
                                        [
                                            'label' => Yii::t('app', 'Personal cabinet'),
                                            'url' => ['/shop/cabinet'],
                                            [
                                                'class' => 'shop-cabinet-link',
                                            ]
                                        ],
                                        [
                                            'label' => Yii::t('app', 'Orders list'),
                                            'url' => ['/shop/orders/list'],
                                            [
                                                'class' => 'shop-orders-list',
                                            ]
                                        ],
                                        [
                                            'label' => Yii::t('app', 'Logout'),
                                            'url' => ['/user/user/logout'],
                                            [
                                                'data-action' => 'post',
                                                'class' => 'logout-link',
                                            ],
                                        ]
                                    ],
                                    'options' => [
                                        'class' => 'dropdown-menu personal-menu',
                                    ],
                                ]) ?>
                </span>
                        <?php endif; ?>


                        <a href="<?= \yii\helpers\Url::toRoute(['/shop/cart']) ?>" class="btn btn-show-cart">
                            <i class="fa fa-shopping-cart cart-icon"></i>
                            <span class="badge items-count" id="cart-count">
                                <?= $itemsCount ?>
                            </span>
                        </a>

                        <a href="<?=Url::to(['/shop/product-compare/compare'])?>" class="btn btn-compare" title="<?=Yii::t('app', 'Compare products')?>">
                            <i class="glyphicon glyphicon-stats compare-icon"></i>
                            <span class="badge items-count" id="compare-count">
                                <?=count(Yii::$app->session->get('comparisonProductList')) ?>
                            </span>
                        </a>

                        <a href="<?=Url::to(['/shop/wishlist'])?>" class="btn btn-wishlist">
                            <i class="fa fa-heart wishlist-icon"></i>
                            <span class="badge items-count" id="wishlist-count">
                                <?= Wishlist::countItems((!Yii::$app->user->isGuest ? Yii::$app->user->id : 0), Yii::$app->session->get('wishlists', [])) ?>
                            </span>
                        </a>
                    </div>

            </div>
        </div>
    </div>
    </div>

    <div class='visible-xs'>


        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-2 col-md1">
                    <ul class="nav nav-pills">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="glyphicon glyphicon-th-list xs-glyphicon"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?= \yii\helpers\Url::toRoute(['/about']) ?>">О нас</a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::toRoute(['/delivery']) ?>">Доставка</a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::toRoute(['/payment']) ?>">Оплата</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-5 col-md4">
                    <a href="<?= \yii\helpers\Url::toRoute(['/']) ?>">
                        <?= Html::img('@web/theme/images/brandlogo.png', ['alt' => 'Наш логотип', 'class' =>'img-responsive xs-logo']) ?>
                    </a>
                </div>

                <div class="col-xs-5 col-md7">
                    <div class="pull-right personal-area">

                        <?php if (Yii::$app->user->isGuest === true): ?>

                            <a href="<?= \yii\helpers\Url::toRoute(['/user/user/login']) ?>" class="btn btn-login">
                                <i class="glyphicon glyphicon-user login-icon"></i>
                                <span id="a-ligin">Вход</span>
                            </a>

                        <?php else: ?>

                            <span class="dropdown">
                    <a href="<?= \yii\helpers\Url::toRoute(['/shop/cabinet']) ?>" class="link-cabinet" data-toggle="dropdown" data-hover="dropdown"><span class="glyphicon glyphicon-user"></span></a>
                                <?= \yii\widgets\Menu::widget([
                                    'items' => [
                                        [
                                            'label' => Yii::t('app', 'User profile'),
                                            'url' => ['/user/user/profile'],
                                            [
                                                'class' => 'user-profile-link',
                                            ]
                                        ],
                                        [
                                            'label' => Yii::t('app', 'Personal cabinet'),
                                            'url' => ['/shop/cabinet'],
                                            [
                                                'class' => 'shop-cabinet-link',
                                            ]
                                        ],
                                        [
                                            'label' => Yii::t('app', 'Orders list'),
                                            'url' => ['/shop/orders/list'],
                                            [
                                                'class' => 'shop-orders-list',
                                            ]
                                        ],
                                        [
                                            'label' => Yii::t('app', 'Logout'),
                                            'url' => ['/user/user/logout'],
                                            [
                                                'data-action' => 'post',
                                                'class' => 'logout-link',
                                            ],
                                        ]
                                    ],
                                    'options' => [
                                        'class' => 'dropdown-menu personal-menu',
                                    ],
                                ]) ?>
                </span>
                        <?php endif; ?>


                        <a href="<?= \yii\helpers\Url::toRoute(['/shop/cart']) ?>" class="btn btn-show-cart">
                            <i class="fa fa-shopping-cart cart-icon"></i>
                            <span class="badge items-count" id="cart-count">
                                <?= $itemsCount ?>
                            </span>
                        </a>

                        <a href="<?=Url::to(['/shop/product-compare/compare'])?>" class="btn btn-compare hidden-xs" title="<?=Yii::t('app', 'Compare products')?>">
                            <i class="glyphicon glyphicon-stats compare-icon"></i>
                            <span class="badge items-count" id="compare-count">
                                <?=count(Yii::$app->session->get('comparisonProductList')) ?>
                            </span>
                        </a>

                        <a href="<?=Url::to(['/shop/wishlist'])?>" class="btn btn-wishlist hidden-xs">
                            <i class="fa fa-heart wishlist-icon"></i>
                            <span class="badge items-count" id="wishlist-count">
                                <?= Wishlist::countItems((!Yii::$app->user->isGuest ? Yii::$app->user->id : 0), Yii::$app->session->get('wishlists', [])) ?>
                            </span>
                        </a>
                    </div>
                </div>

            </div>
        </div>


    </div>


<?php

if (Yii::$app->user->isGuest === false) {
    $js = <<<JS
$('.link-cabinet').dropdownHover();
JS;
    $this->registerJs($js);

}