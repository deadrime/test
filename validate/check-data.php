<?php

$mysqli = new mysqli("192.168.1.37","root","","testbd");//подключаемся к бд, тут бы еще проверку добавить

$type = $_POST['type'];

switch($type) {
    case 1: //проверяем логин
        $username = $_POST['username'];//получаем имя пользователя из post
        $query = $mysqli->query("SELECT username FROM users WHERE username='" . $username . "'");//ищем строчку с нашим логином

        if ($query->num_rows) {//если нашли - отправим 1
            echo 1;
        }
        else {
            echo 0;//если нет - 0
        }
    break;
        
    case 2: //проверяем пароль
        $email = $_POST['email'];
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){//а емейл ли?
            echo 2;
        }
        else {//если да, то ищем его в бд
            $query = $mysqli->query("SELECT email FROM users WHERE email='" . $email . "'");//ищем строчку с нашим логином
            if ($query->num_rows) {
                echo 1;
            }
            else {
                echo 0;
            }
        }
    break;
}

?>