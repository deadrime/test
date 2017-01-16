function callback(data,textStatus, jqXHR) {

}

$(document).ready(function () {
    var var1 = 1;
    var var2 = 2;
    var var3 = 3;
    alert('Будут переданы параметры: ' + var1 + ' ' + var2 + ' ' + var3);
   
    $.post(
        '/some.php',
        {
            var1: var1,
            var2: var2,
            var3: var3 
        },
        onAjaxSuccess
    );
    function onAjaxSuccess(data)
    {
        alert(data);
    }
    
    /*
    $.ajax({
        type: 'POST',
        url: '/some.php',
        data:
        {
            var1: var1,
            var2: var2,
            var3: var3
        },
        dataType: 'jsonp',
        success: callback
    });
    */
});


