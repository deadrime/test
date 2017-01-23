
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создание заметок</title>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="notes.js"></script>
    <script
        src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="main.css">
</head>
<body>

<div class="content_wrapper">
    <ul id="responds">
    <?php
    //Вывод заметки
    include_once 'config.php';//Подкоючаемся к бд
    $allnotes =  $sql->query('SELECT id,header,text FROM notes ORDER BY priority ASC');
    if ($allnotes->num_rows!=0) {
        //выводим все записи из таблицы
        while ($row = $allnotes->fetch_assoc()){
            echo '<li id="item_'.$row["id"].'">';
            echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">';
            echo '<img src="images/icon_del.gif" border="0" />';
            echo '</a></div>';
            echo '<div class="note_header"><h3>';
            echo $row['header'];
            echo '</h3></div>';
            echo '<div class="note_content">';
            echo '<p>'.$row['text'].'</p></div></li>';
        }
    }
    $sql->close();
    ?>
    </ul>
<div class="form_style">
    <input id="note_header" type="text">
    <br>
    <textarea name="content_txt" id="note_text" cols="45" rows="5"></textarea>
    <br>
    <button id="FormSubmit">Добавить заметку</button>
</div>
</div>

</body>
</html>