<?php

header("content-type:application/json");

$arrayValues = array('Marco Segura' => '2e75510b33c979b0', 'Davide Tonti' => '88PP44', 'Natalia Oviedo' => 'feaf1b0796d76e33');
$today = date("d/m/Y H:i");

if (isset($_POST['typeFunction'])) {

    $type = $_POST['typeFunction'];

    if ($type == 'inicial') {

        if (isset($_POST['macAddress'])) {

            $name = array_search($_POST['macAddress'], $arrayValues);
            if ($name) {

                $values = array('name' => $name, 'registerIn' => '23/10/2014 11:45', 'registerOut' => '0');

                deliverResponse(200, $values);
            } else {
                deliverResponse(400, "Invalid request");
            }


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
        deliverResponse(200, $today);

    } else if ($type == 'registerOut') {
        deliverResponse(200, $today);

    }

}


function deliverResponse($status, $data)
{

    $response['status'] = $status;
    $response['data'] = $data;

    echo json_encode($response);

}
