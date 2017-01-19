$(document).ready(function () {
    $('#username').on("input", function () { //Вешаем событие на изменение инпута\
        $('.valid.username').show().removeClass().addClass('valid username loading');
        var username = $(this).val(); //получаем логин
        window.clearTimeout($(this).data("timeout")); //сбрасываем таймер
        $(this).data("timeout", setTimeout(function () {checklogin(username)}, 2000));//через 3 секунды начинаем проверку логина
    });
    
    $('#email').on('input',function() {
        $('.valid.email').show().removeClass().addClass('valid email loading');
        var username = $(this).val(); //получаем логин
        window.clearTimeout($(this).data("timeout")); //сбрасываем таймер
        $(this).data("timeout", setTimeout(function () {checkmail(username)}, 2000));//через 3 секунды начинаем проверку логина    
    });
});

function checklogin(username) {
    if (username.length < 4 || username.length > 20) { //Сначала проверяем длину логина
        $('.valid.username').removeClass().addClass('valid username error');
            $('.username .msg').text('Длина логина - от 4 до 20 символов.').show();
    } else {
        $.post(
            'check-data.php', {
                type:1,
                username: username //передаем имя пользователя в качестве параметра
            },
            CheckResponce
        );
        function CheckResponce(data) {
            if (data==1) {
                $('.valid.username').removeClass().addClass('valid username error');
                $('.username .msg').text('Логин занят.').show();
            }
            else if(data==0) {
                $('.valid.username').removeClass().addClass('valid username okey');
                $('.username .msg').text('').hide();
            }
        }
    }
}

function checkmail(email) {
    $.post(
        'check-data.php', {
            type:2,
            email: email //передаем имя пользователя в качестве параметра
        },
        CheckResponce
    );
    function CheckResponce(data) {
       switch(data) {
            case '0'://все ок
                $('.valid.email').removeClass().addClass('valid email okey');
                $('.email .msg').text('').hide();
                break;
            case '1'://есть совпадение в бд
                $('.valid.email').removeClass().addClass('valid email error');
                $('.email .msg').text('Этот e-mail уже зарегистрирован.').show();;
                break;
            case '2'://не является емейлом
                $('.valid.email').removeClass().addClass('valid email error');
                $('.email .msg').text('Некорректный e-mail.').show();;
                break;          
       }
    }
}