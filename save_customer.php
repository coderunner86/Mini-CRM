<?php
include("database/db.php");
if (isset($_POST['save_customer'])){
    $fullname = $_POST['fullname'];
    $customer_phone = $_POST['customer_phone'];
    $description = $_POST['description'];
    $query = "INSERT INTO customers(fullname, customer_phone, description) VALUES ('$fullname', '$customer_phone', '$description')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("Query failed");
    }
    $_SESSION['message'] = 'Customer saved succesfully, go to the customer section to see';
    $_SESSION['message_type'] = 'success';
    header("Location: index.php");
}
?>