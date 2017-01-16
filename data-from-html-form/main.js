$(document).ready(function () {
    $("#someform").on('submit', function () {
        var data = $(this).serializeArray();
        
        console.log(data[0].value); //Вот так

        for (i = 0; i < data.length; i++) { //Или так
            console.log(data[i].value);
        }

        data.forEach(function (data) { //Или так
            console.log(data.value);
        });

    });
});