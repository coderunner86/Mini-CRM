<?php include("autentication.php") ?>
<?php
function showdata()
{
    $endpoint_username = 'ICXCandidate';
    $endpoint_password = 'Welcome2021';
    $endpoint = "https://imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts";
    $data = curl_init($endpoint);
    $employees = autentication($data, $endpoint_username, $endpoint_password);
    foreach ($employees->items as $employee) {
        $id_employee = $employee->id;
        $createdTime = strtotime($employee->createdTime);
        $createdTime = date('d-m-Y', $createdTime);
//Obtain ID, name, created Time
       echo "<tr><td>{$employee->id}</td>";
       echo "<td>{$employee->lookupName}</td>";
       echo "<td>{$createdTime}</td>";
    
        $data = curl_init($employee->links[0]->href);
        $contact_data = autentication($data, $endpoint_username, $endpoint_password);
//Obtain City
       echo "<td>{$contact_data->address->city}</td>";
//Obtain email address 
        //primary auth
        $data_emails = curl_init($contact_data->emails->links[0]->href);
        $contact_emails = autentication($data_emails, $endpoint_username, $endpoint_password);
        //secondary auth
        $data_email = curl_init($contact_emails->items[0]->href);
        $contact_address = autentication($data_email, $endpoint_username, $endpoint_password);
       echo "<td>{$contact_address->address}</td>";
//Obtain phone number
        //primary auth
        $data_phones = curl_init($contact_data->phones->links[0]->href);
        $contact_phones = autentication($data_phones, $endpoint_username, $endpoint_password);
        //secondary auth
        $data_phone = curl_init($contact_phones->items[0]->href);
        $contact_number = autentication($data_phone, $endpoint_username, $endpoint_password);
       echo "<td>{$contact_number->number}</td></tr>";        
    
    }
}
?>