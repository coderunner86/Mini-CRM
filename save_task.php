<?php
include("database/db.php");
if (isset($_POST['save_task'])){
    $title = $_POST['title'];
    $customer = $_POST['customer'];
    $customer_phone = $_POST['customer_phone'];
    $description = $_POST['description'];
    $query = "INSERT INTO task(title, customer, customer_phone, description) VALUES ('$title', '$customer', '$customer_phone', '$description')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("Query failed");
    }
    $_SESSION['message'] = 'Task saved succesfully';
    $_SESSION['message_type'] = 'success';
    header("Location: index.php");
}

?>