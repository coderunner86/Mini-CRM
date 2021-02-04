<?php include("autentication.php") ?>
<?php
function mostrarDatos()
{
    $endpoint_username = 'ICXCandidate';
    $endpoint_password = 'Welcome2021';
    $endpoint = "https://imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts";
    $data = curl_init($endpoint);

    $employees = autentication($data, $endpoint_username, $endpoint_password);

    foreach ($employees->items as $employee) {

        $createdTime = strtotime($employee->createdTime);
        $createdTime = date('d-m-Y', $createdTime);
        echo "<tr>
            <td>{$employee->id}</td>
            <td>{$employee->lookupName}</td>
            <td nowrap>{$createdTime}</td>";

        $data = curl_init($employee->links[0]->href);
        $personal_data = autentication($data, $endpoint_username, $endpoint_password);

        echo "<td>{$personal_data->address->city}</td>";

        $data_info = curl_init($personal_data->emails->links[0]->href);
        $contact_info = autentication($data_info, $endpoint_username, $endpoint_password);

        $data_info2 = curl_init($contact_info->items[0]->href);
        $contact_info2 = autentication($data_info2, $endpoint_username, $endpoint_password);
        echo "<td>{$contact_info2->address}</td>";

        $personal_data = autentication($data, $endpoint_username, $endpoint_password);

        $personal_phones = curl_init($personal_data->phones->links[0]->href);
        $contact_phone = autentication($personal_phones, $endpoint_username, $endpoint_password);

        $data_info3 = curl_init($contact_phone->items[0]->href);
        $contact_info3 = autentication($data_info3, $endpoint_username, $endpoint_password);
        echo "<td>{$contact_info3->number}</td>";
    }
}

?>