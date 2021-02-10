
<?php

function post_info($fn, $ln, $ci, $em, $ph)
{
    $my_array_data = array("name" => array("first" => $fn, "last" => $ln), "address" => array("city" => $ci), "emails" => array("address" => $em, "addressType" => array("id" => 0)), "phones" => array("number" => $ph, "phoneType" => array("id" => 0)));
    $data = json_encode($my_array_data);
    $url = "https://ICXCandidate:Welcome2021@imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts";
    $headers = array('X-HTTP-Method: POST');
    $headers = array('Content-Type: application/json');
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($curl);
    curl_close($curl);
    //header("Location: index.php");
}

?>