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




