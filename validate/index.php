<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>тест json</title>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="login.js"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <form id="userdata">
        <span>Логин</span>
        <div class="valid username"><input type="text" name="username" id="username"><span class="msg"></span></div>
        <span>E-mail</span>
        <div class="valid email"><input type="text" name="email" id="email"><span class="msg"></span></div>
        <span>Пароль</span>
        <div class="valid password"><input type="text" name="password" id="password"><span class="security">Надежность пароля</span><div class="passline"><div></div></div></div>
        <button type="submit" class="btn">Регистрация</button>
    </form>
</body>
</html>