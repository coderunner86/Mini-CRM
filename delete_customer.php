<?php
    include("database/db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM customers WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (!$result){
                die("Query failed");
        }

        $_SESSION['message'] = 'Customer removed successfully';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
    }   
?>