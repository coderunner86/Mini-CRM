<?php
    include("database/db.php");
    $id = $_GET['id'];
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM employees WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (!$result) {
                die("Query failed");
        }
        $value = $id;
        $url = "https://ICXCandidate:Welcome2021@imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts/$value";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $result = json_decode($result);
        curl_close($ch); 

        header("Location: index.php");
        $_SESSION['message'] = 'Employee removed successfully';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
    }
?>
