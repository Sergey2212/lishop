<?php
use app\models\ObjectStaticValues;
use app\models\PropertyStaticValues;
use app\modules\shop\models\WarehouseProduct;
?>

<div>

    <!------------------- Вывод вариантов продукта-------------------->
    <?php



    $parentsID= [];
    foreach ($model->options as $parentId) {
        $parentsID[] = $parentId->id;
    }

    //property_static_value_id   дочерних продуктов
    $valuesID = ObjectStaticValues::findAll([
        'object_model_id' => $parentsID
    ]);
    $valueID=[];
    foreach ($valuesID  as $valu ){
        $valueID[] = $valu->property_static_value_id.', ';
    }
    ?>


    <h3>Цвета</h3>
    <?php
    $color = PropertyStaticValues::find()
        ->where (['id' => $valueID, 'property_id' => 8])
        ->all();
    ?>
    <div class="btn-group">
        <?php foreach ($color  as $value ):?>

            <?php
            //Номера ID продуктов по ID статического свойства продукта (размер, цвет)

            $propStatValId = $value->id;
            $productsId= PropertyStaticValues::find()
                ->where(['id' => $propStatValId])
                ->one();
            $productIds= $productsId->productsId;
            $productIdsID= [];
            foreach ($productIds as $productIds ){
                if (in_array($productIds->id, $parentsID)) {
                    $productIdsID [] = $productIds->id .',';
                }
            }

            //Считает сколько продуктов определённого размера или цвета по ID размера или цвета
            $count = WarehouseProduct::find()
                ->select([
                    'warehouse_product.in_warehouse', // select all customer fields
                ])
                ->where(['in', 'product_id', $productIdsID])
                ->sum('[[in_warehouse]]');
            //echo $count;
            ?>
            <?php if($count != 0):?>
                <button type="button" class="btn btn-success">
                    <?= $value->name . ' ('.$count.')'?>
                </button>
            <?php endif;?>
            <?php if($count == 0):?>
                <button type="button" class="btn btn-danger">
                    <?= $value->name?>
                </button>
            <?php endif;?>
        <?php endforeach;?>
    </div>
    <br style="clear:both">


    <h3>Размеры</h3>
    <?php
    $size = PropertyStaticValues::find()
        ->where (['id' => $valueID, 'property_id' => 11])
        ->orderBy('name')
        ->all();
    ?>


    <div class="btn-group">
        <?php foreach ($size as $value ):?>

            <?php
            //Номера ID продуктов по ID статического свойства продукта (размер, цвет)

            $propStatValId = $value->id;
            $productsId= PropertyStaticValues::find()
                ->where(['id' => $propStatValId])
                ->one();
            $productIds= $productsId->productsId;
            $productIdsID= [];
            foreach ($productIds as $productIds ){
                if (in_array($productIds->id, $parentsID)) {
                    $productIdsID [] = $productIds->id .',';
                }
            }

            //Считает сколько продуктов определённого размера или цвета по ID размера или цвета
            $count = WarehouseProduct::find()
                ->select([
                    'warehouse_product.in_warehouse', // select all customer fields
                ])
                ->where(['in', 'product_id', $productIdsID])
                ->sum('[[in_warehouse]]');
            //echo $count;
            ?>
            <?php if($count != 0):?>
                <button type="button" class="btn btn-success">
                    <?= $value->name. ' ('.$count.')'?>
                </button>
            <?php endif;?>
            <?php if($count == 0):?>
                <button type="button" class="btn btn-danger">
                    <?= $value->name?>
                </button>
            <?php endif;?>
        <?php endforeach;?>
    </div>
    <br style="clear:both">


</div> <!-- /properties-widget -->
