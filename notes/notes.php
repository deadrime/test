<?php
include_once 'config.php';
//получаем параметры из post запроса
$note_header = $_POST['header'];
$note_text = $_POST['text'];
$delid = $_POST['thatdel'];

if (isset($note_text) || isset($note_header)) {//Добавляем, если есть что добавлять
    $maxid = $sql->query('SELECT MAX(priority) as priority FROM notes');//находим элемент на последнем месте
    $newid = $maxid->fetch_assoc()['priority'] +1; // добавляем к нему 1
    $sql->query('INSERT INTO notes(header,text,priority) VALUES ("' . $note_header . '","' . $note_text . '",' .$newid .')');//запрос на добавление
    //выводим добавляемую заметку в браузере, и да, вывод в php отвратителен....
    echo '<li id="item_'.$newid.'">';
    echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$my_id.'">';
    echo '<img src="images/icon_del.gif" border="0" />';
    echo '</a></div>';
    echo '<div class="note_header"><h3>';
    echo $note_header;
    echo '</h3></div>';
    echo '<div class="note_content">';
    echo '<p>'.$note_text.'</p></div></li>';
}
elseif(isset($delid)>0){//если есть, что удалять
    $sql->query('DELETE FROM notes WHERE id=' . $delid);
}
elseif ($_POST['update'] == 'update'){
    $count = 1;
    $array = $_POST['item'];
    foreach ($array as $idval) {
        $query = "UPDATE notes SET priority = " . $count . " WHERE id = " . $idval;
        $sql->query($query) or die('Ошибка');
        $count ++;
    }
}
/*
//думал, что так будет быстрее, но это работает только если менять соседние элементы.
elseif($_POST['update2'] == 'update2'){//Если нужно поменять местами соседние
    $sql->query('
    UPDATE notes AS t1
    JOIN notes AS t2 ON ( t1.id = ' . $_POST[1] . ' AND t2.id =' . $_POST[2] . ')
    SET
      t1.priority = t2.priority,
      t2.priority = t1.priority;
    ');
    echo ('
    UPDATE notes AS t1
    JOIN notes AS t2 ON ( t1.id = ' . $_POST[1] . ' AND t2.id = ' . $_POST[2] . ')
    SET
      t1.priority = t2.priority,
      t2.priority = t1.priority;
    ');
}
?>
*/