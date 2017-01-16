####Своими словами:
+ В php используются json_encode() и json_decode().
Если нужно передать массив, то он формируется:
В php:
```php
$jsondata = array(
    'param1'=>$value1,
    'param2'=>$value2
);
```
В javascript:
```javascript
var mydata = {
            var1: var1,
            var2: var2
    };
```

+ В javascript используются JSON.stringify() и JSON.parse()
Чтобы отправить данные:
```javascript
    $.ajax({
    ...
    data: {
           jsonData: JSON.stringify(mydata)
        },
    ...
    )};
```

+ Чтобы прочитать ответ нужно указать dataType:'json' или использовать JSON.parse()

+ Чтобы прочитать полученные данные:
В php:
```php
foreach ($data as $parameter=>$value) {
...
}
```
В javascript:
```javascript
$.each(data, function(parameter, value) {
...
}); 
```

####Почитать о jason:
+ [developer.mozilla.org](https://developer.mozilla.org/ru/docs/Web/JavaScript/Reference/Global_Objects/JSON) - Спецификация объекта на сайте мозиллы
+ [learn.javascript.ru](https://learn.javascript.ru/json) - с примерами
+ [php.net](http://php.net/manual/ru/book.json.php) - Работа с json в php