<?php include("database/db.php") ?>
<?php include("post_info.php") ?>
<?php
include("autentication.php");
$endpoint_username = 'ICXCandidate';
$endpoint_password = 'Welcome2021';
if (isset($_POST['save'])) {
    //$id = $_POST['id'];    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    $fn = $firstname;
    $ln = $lastname;
    $ci = $city;
    $em = $email;
    $ph = $phone;
    post_info($fn, $ln, $ci, $em, $ph);
    $endpoint = "https://ICXCandidate:Welcome2021@imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts";
    $data = curl_init($endpoint);
    $employees = autentication($data, $endpoint_username, $endpoint_password);
    foreach ($employees->items as $employee) {
    }
    $id_remote = $employee->id;
    $query = "INSERT INTO employees(firstname, lastname, city, email, phone, description, id, id_remote) VALUES ('$name', '$lastname', '$city', '$email', '$phone', '$description', '$id_remote', '$id_remote')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query failed");
    }
    $_SESSION['message'] = 'Employee saved succesfully';
    $_SESSION['message_type'] = 'success';
    header("Location: index.php");
}
?>
