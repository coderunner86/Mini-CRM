<?php
include("autentication.php");
$endpoint_username = 'ICXCandidate';
$endpoint_password = 'Welcome2021';
$url = "https://ICXCandidate:Welcome2021@imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts/?q=id";

$data = curl_init($url);
$employees = autentication($data, $endpoint_username, $endpoint_password);

foreach ($employees->items as $employee) {
    $id_employee = $employee->id;
    for ($id_employee = 0; ; $id_employee++) {
     print "$id_employee \t\n";
    }
   
}

?>