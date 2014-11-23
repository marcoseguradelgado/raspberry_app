<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://localhost/RESP_Server/RaspBerry_WebService/SOAP/server.php?macAddress=88PP44',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
var_dump($resp);
// Close request to clear up some resources
curl_close($curl);

