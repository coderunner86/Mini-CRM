<?php

include("db.php");

if (isset($_POST['save_employee'])){

    $name = $_POST['name'];

    $description = $_POST['description'];

    $city = $_POST['city'];

    $email = $_POST['email'];

    $phone = $_POST['phone'];




    #echo $title;

    #echo $description;

    $query = "INSERT INTO employees(name, description, city, email, phone) VALUES ('$name', '$description', '$city', '$email', '$phone' )";

    $result = mysqli_query($conn, $query);

    if (!$result){

        die("Query failed");

    }

    $_SESSION['message'] = 'Employee saved succesfully';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");

}

?>