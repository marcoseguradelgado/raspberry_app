<?php

header("content-type:application/json");
$today = date("d/m/Y H:i");
$url = 'http://192.168.0.109/soap/server.php';


if (isset($_POST['typeFunction'])) {

    $type = $_POST['typeFunction'];

    if ($type == 'inicial') {

        if (isset($_POST['macAddress'])) {

            $postData = array('typeFunction' => 'inicial','macAddress' => $_POST['macAddress']);

        } else {
            deliverResponse(400, "Invalid request");
        }

    } else if ($type == 'register') {

        if (isset($_POST['uuid']) && isset($_POST['idEmployee']) && isset($_POST['nameEmployee'])) {
            deliverResponse(200, "Correct");
        } else {
            deliverResponse(400, "Cédula del empleado ya existe registrada a otro teléfono");
        }

    } else if ($type == 'registerIn') {
        $postData = array('typeFunction' => 'registerIn','uuid' => $_POST['macAddress']);
    } else if ($type == 'registerOut') {
        $postData = array('typeFunction' => 'registerOut','uuid' => $_POST['macAddress']);
    }

}

$curl = curl_init($url);
curl_setopt ($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $postData); // Your array field
curl_setopt ($curl, CURLOPT_RETURNTRANSFER, true);
$resp = curl_exec($curl);
echo json_encode($resp);
curl_close($curl);


function deliverResponse($status, $data)
{

    $response['status'] = $status;
    $response['data'] = $data;

    echo json_encode($response);

}
