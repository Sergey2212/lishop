<?php
use app\models\ObjectStaticValues;
use app\models\PropertyStaticValues;
use app\modules\shop\models\WarehouseProduct;
use kartik\helpers\Html;
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
    <div id="colorButtons">
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
                    $productIdsID [] = $productIds->id;
                }
            }


            //Считает сколько продуктов определённого размера или цвета по ID размера или цвета
            $count = WarehouseProduct::find()
                ->select([
                    'warehouse_product.in_warehouse', // select all customer fields
                ])
                ->where(['in', 'product_id', $productIdsID])
                ->sum('[[in_warehouse]]');

            //Строка ID продуктов определённого цвета
            $stringColorId = implode(",", $productIdsID );

            ?>
            <input type="radio"
                   name="option"
                   value="<?= $stringColorId;?>"
                   id="value"
                   class="none input-color"/>
            <label for="<?= $stringColorId;?>"
                   data-toggle="tooltip"
                   data-trigger="hover"
                   title="Нет в наличии"
                   class="not-selected label-color"
                   onclick = "setSizes('<?=$stringColorId?>')" >
                <?= $value->name .'('. $count . ')'?>
            </label>
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


    <div id="sizeButtons">
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
                    $productIdsID [] = $productIds->id ;
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

            //Строка ID продуктов определённого размера
            $stringSizeId = implode(",", $productIdsID );

            ?>
            <input type="radio"
                   name="option"
                   value="<?= $stringSizeId?>"
                   id="value"
                   class="none input-size"/>
            <label for="<?= $stringSizeId?>"
                   data-toggle="tooltip"
                   data-trigger="hover"
                   title="Нет в наличии"
                   class="not-selected label-size"
                   onclick = "setColor('<?=$stringSizeId?>')">
                <?= $value->name .'('. $count . ')'?>
            </label>
        <?php endforeach;?>
    </div>
    <br style="clear:both">


</div> <!-- /properties-widget -->


<?= Html::jsFile('@web/theme/js/main.js') ?>

    <script type="text/javascript">






    $('label.label-size').click(function(){
        $('label.label-size').removeClass('selected').addClass('not-selected');
        $(this).removeClass('not-selected').addClass('selected');
    });



        function setSizes(colorProdId) {
            var arr = getIntersection(makeArrayFromString(colorProdId), arrSizeProductId);
            console.log(colorProdId);
//Получим данные обратно из localStorage в виде JSON:
            var json = localStorage.getItem('obj');
//Преобразуем их обратно в объект JavaScript:
            var arr3 = JSON.parse(json);
            if (arr3) {
                for (var i = 0; i < arr3.length; i++) {
                    $('.label-size').removeClass('selected').addClass('not-selected');
                };
            };
            var arr2 = [];
            for (var i = 0; i < arr.length; i++) {
                $('.label-size').eq(arr[i]).removeClass('not-selected').addClass('selected');
                arr2.push(arr[i]);
            };
//Сериализуем его в "arr": [1, 2, 3]}':
            var json = JSON.stringify(arr2);
//Запишем в localStorage с ключом obj:
            localStorage.setItem('obj', json);

        }

        //Возвращает строку с числом которое есть в обоих массивах
        function getStrMatchArray (arr1, arr2) {
            var str = getMatchArray(arr1, arr2).join('');
            return str;
        }

    </script>


