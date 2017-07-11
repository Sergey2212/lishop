//Возвращает совпадение в массивах
function getMatchArray(arr1, arr2) {
    var arr3 = [];
    for (var i = 0; i < arr1.length; i++) {
        if(inArray(arr1[i], arr2)) {
            arr3.push(arr1[i]);
        }
    }
    return arr3;
}

//Сливает двухмерные массивы. Возвращает позиции подмассивов arr2
//в которых есть числа из arr1
function getIntersection(arr1, arr2) {
    var arr3 = [];
    for (var i = 0; i < arr1[0].length; i++) {
        for (var j = 0; j < arr2.length; j++) {
            if(inArray(arr1[0][i], arr2[j])) {
                arr3.push(j);
            }
        }

    }
    return arr3;
}

// Есть ли число(value) в массиве
function inArray(value, arr) {
    for (var i = 0; i < arr.length; i++) {
        if(arr[i] == value) {
            return true;
        }
    }
    return false;
}

// Есть ли число(value) в двухмерном массиве
function inMultiArray(value, arr) {
    for (var j = 0; j < arr.length; j++) {
        for (var k = 0; k < arr[j].length; k++) {
            if(arr[j][k] == value) {
                return true;
            }
        }
    }
    return false;
}

//Преобразует строку в массив
function makeArrayFromString(str){
    var arr = [];
    var strSplit = str.split(',');
    arr.push(strSplit);
    return arr;
}


    $('label.label-color').click(function(){
        $('label.label-color').removeClass('selected').addClass('not-selected');
        $(this).removeClass('not-selected').addClass('selected');
    });



$(function () { //Всплывающая подсказка на кнопках
    $("[data-toggle='tooltip']").tooltip();
});


var objColor = $(':input.input-color');
var arrColorProductId = [];//Массив ID продуктов по цветам
var strColId;
for (var i = 0; i < objColor.length; i++) {
    strColId =  objColor[i]['value'];
    var arrColId = strColId.split(',');
    arrColorProductId.push(arrColId);
};
//console.log(arrColorProductId);


var objSize = $(':input.input-size');
var arrSizeProductId = [];//Массив ID продуктов по размерам
var strSzId;
for (var i = 0; i < objSize.length; i++) {
    strSzId =  objSize[i]['value'];
    var arrSzId = strSzId.split(',');
    arrSizeProductId.push(arrSzId);
};
//console.log(arrSizeProductId);

$('label.label-size').click(function(){
    var dataSelect = $(this).attr('data-select');
    if (dataSelect == 1){
        $('label.label-size.selected').removeClass('selected').addClass('halh-selected');
        $('label.label-size.not-selected').removeClass('halh-selected not-size-selected');
        $(this).removeClass('halh-selected').addClass('selected');
    }else{
        $('label.label-size.selected').removeClass('selected').addClass('halh-selected');
        $('label.label-size.not-size-selected').removeClass('not-size-selected');
        $(this).addClass('not-size-selected');
    }
});


function setSizes(colorProdId) {
    var arr = getIntersection(makeArrayFromString(colorProdId), arrSizeProductId);
//console.log(makeArrayFromString(colorProdId));

//Получим данные обратно из localStorage в виде JSON:
    var json = localStorage.getItem('obj');
//Преобразуем их обратно в объект JavaScript:
    var arr3 = JSON.parse(json);
    if (arr3) {
        for (var i = 0; i < arr3.length; i++) {
            $('label.label-size').removeClass('selected halh-selected not-size-selected').addClass('not-selected');
        };
    };
    var arr2 = [];
    $('.label-size').attr({'data-original-title' : 'Нет в наличии Можно заказать', 'data-select' : "0"});
    for (var i = 0; i < arr.length; i++) {
        $('.label-size').eq(arr[i]).removeClass('not-selected').addClass('halh-selected').attr({'data-original-title' :                         'Добавить в корзину' , 'data-select' : "1"});
        arr2.push(arr[i]);
    };
//Сериализуем его в "arr": [1, 2, 3]}':
    var json = JSON.stringify(arr2);
//Запишем в localStorage с ключом obj:
    localStorage.setItem('obj', json);

}

function setColor (sizeProdId, nameSize) {
    var arSzProdId = sizeProdId.split(',');
    var strColProdId = $('div#colorButtons .selected').attr('for');
    var nameColor = $('div#colorButtons .selected').attr('data-name');
    if(strColProdId){
        var arColProdId = strColProdId.split(',');
        var idProdCard = getStrMatchArray(arSzProdId, arColProdId);
        if(idProdCard){
            $('.btn-add-to-cart').attr({'data-id' : idProdCard, 'data-action'  : "add-to-cart", 'disabled' : false});
            console.log(idProdCard);
        }else{
            $('.btn-add-to-cart').attr({'data-action'  : "", 'disabled' : true});
            console.log(nameColor +  nameSize);
        }

    }

}

//Возвращает строку с числом которое есть в обоих массивах
function getStrMatchArray (arr1, arr2) {
    var str = getMatchArray(arr1, arr2).join('');
    return str;
}



