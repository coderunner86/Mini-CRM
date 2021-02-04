<?php

include("db.php");

if (isset($_POST['save_employee'])) {
    $name = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    $data = [
        'name' => [
          'first' => 'name',
          'last' => ' city',
        ],
    ];
    
    $query = "INSERT INTO employees(firstname, description, lastname, city, email, phone) VALUES ('$name', '$description', '$surname', '$city', '$email', '$phone')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed");
    }

    $_SESSION['message'] = 'Employee saved succesfully';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}
