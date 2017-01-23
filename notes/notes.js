$(document).ready(function () {
    $('#FormSubmit').click(function () {

        var header = $('#note_header').val();
        var text = $('#note_text').val();

        if (text==''){
            alert('Заполни все поля, пидор!');
            return false;
        }

        var myData = {//посылаем все поля
            'header':header,
            'text':text
        };

        $.post('notes.php',myData,okey);
        function okey(data){
            $("#responds").append(data);//после успешного ответа сервера добавляем новую заметку в конец
            $("#contentText").val(''); //очищаем текстовое поле после успешной вставки
        }
    });

    $( "#responds" ).sortable(
        {
            opacity: 0.8,
            cursor: 'move',
            update: updatesort
        }
    );

    function updatesort(event,ui) {
        var array = $(this).sortable("serialize") + '&update=update';
        $.post('notes.php',array,resp);
        function resp(data) {
             //console.log(data);
        }
    }
    //Удаляем запись при клике по крестику
    $("body").on("click", "#responds .del_button", function() {
        var clickedID = this.id.split("-"); //Разбиваем строку
        var DbNumberID = clickedID[1]; //и получаем номер из массива
        var myData = 'thatdel='+ DbNumberID; //выстраиваем  данные для POST

        $.post('notes.php',myData,okey);
        function okey() {
            $('#item_'+DbNumberID).fadeOut("slow");
        }
    });
});

/*
//если хотим менять местами только соседние элементы.
 $('.ui-sortable-handle').droppable({
 opacity:0.8,
 cursor: 'move',
 drop: drop
 });

 function drop(event, ui) {
 //получаем id вида item_id и отделяем id
 var draggableId = ui.draggable.attr("id").split('_')[1];
 var droppableId = $(this).attr("id").split('_')[1];
 myData = {
 'update2':'update2',
 1:draggableId,
 2:droppableId
 };
 $.post('notes.php',myData,okey);
 function okey() {

 }
 console.log(draggableId + ':' + droppableId);
 }
 */
