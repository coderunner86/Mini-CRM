
<?php
function patch_info($firstname,$lastname, $city, $email, $phone, $value)
{
    $my_array_data = array("name" => array("first" => $firstname, "last" => $lastname), "address" => array("city" => $city), "emails" => array("address" => $email, "addressType" => array("id" => 0)), "phones" => array("number" => $phone, "phoneType" => array("id" => 0)));
    $data = json_encode($my_array_data); 
    $url = "https://ICXCandidate:Welcome2021@imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts/$value"; 
    $headers = array('X-HTTP-Method-Override: POST');
    $headers = array('Content-Type: application/json');
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
}
?>