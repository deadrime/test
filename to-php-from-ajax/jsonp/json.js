$(document).ready(function () {
    var var1 = 13;
    var var2 = 126;
    var var3 = "Вася Пупкин";
    
    console.log('Будут переданы параметры: ' + var1 + ' ' + var2 + ' ' + var3);
    
    var mydata = {
            var1: var1,
            var2: var2,
            var3: var3,
    };
    
    //Как я понял - преимущество json - не обязательно знать название(ключ) параметра, мы передаем объект. Но честно говоря такое себе.
    
    $.ajax({
        url: 'json.php',
        type:'POST',
        contentType: 'application/x-www-form-urlencoded;charset=utf-8',
        data: {
           jsonData: JSON.stringify(mydata)//посылаем в формате json
        },
        dataType:'json',
        success: function(data){ 
            console.log('Получен ответ от сервера:');
            console.log(data.parameter2);//значение конкретного параметра
            $.each(data, function(index, value) {
                console.log(index + ':' + value);
            }); 
        }       
    });
});