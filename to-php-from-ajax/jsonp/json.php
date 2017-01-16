<?php
$data = json_decode($_POST['jsonData']);

$response = 'Получены сдедующие данные:';

foreach ($data as $parameter=>$value) {//считываем полученные параметры
    $response .= 'параметр: '.$parameter.'; значение: '.$value.' ';
}

//сформируем ответ сервера в json

$jsonresponse = array(
    'parameter1'=>$response,
    'parameter2'=>'Ты пидор.'
);

echo json_encode($jsonresponse);//посылаем ответ в формате json
?>