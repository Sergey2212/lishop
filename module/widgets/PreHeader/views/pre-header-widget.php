<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="top-panel">
    <div class="container">
        <div class="row">
            <ul class="col-sm-7 col-md-5 top-panel-ul">
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
            <div class="col-sm-5 col-md-7 top-panel-div">
                <div class="right">
                    <div class="personal-area">
                        <?php if (Yii::$app->user->isGuest === true): ?>
                            <a href="<?= \yii\helpers\Url::toRoute(['/user/user/login']) ?>">
                                Личный кабинет
                            </a>

                        <?php else: ?>


                            <?= Yii::t('app', 'Hi') ?>,
                            <span class="dropdown">
                    <a href="<?= \yii\helpers\Url::toRoute(['/shop/cabinet']) ?>" id="link-cabinet" data-toggle="dropdown" data-hover="dropdown"><?= Html::encode(Yii::$app->user->identity->username) ?></a>!
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
                </div>
            </div>
        </div>
    </div>

    </div>
</div>