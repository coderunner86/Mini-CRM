<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include("db.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM employees WHERE id=$id";
    $result =  mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $city = $row['city'];
        $email = $row['email'];
        $phone = $row['phone'];
        $description = $row['description'];
        $id = $row['id'];
        $id_remote = $row['id_remote'];
    }
}
if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    $id = $_POST['id'];
    $id_remote = $_POST['id_remote'];
    $fn = $firstname;
    $ln = $lastname;
    $ci = $city;
    $em = $email;
    $ph = $phone;
    $my_array_data = array("name" => array("first" => $fn, "last" => $ln), "address" => array("city" => $ci), "emails" => array("address" => $em, "addressType" => array("id" => 0)), "phones" => array("number" => $ph, "phoneType" => array("id" => 0)));
    $data = json_encode($my_array_data); 
    $url = 'https://ICXCandidate:Welcome2021@imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts/635';
    $headers = array('X-HTTP-Method-Override: POST');
    $headers = array('Content-Type: application/json');
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
    $query = "UPDATE employees set firstname = '$firstname', description='$description', lastname='$lastname', city='$city', email='$email', phone='$phone';";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Employee update success';
    $_SESSION['message_type'] = 'warning';
    header("Location: index.php");
}
?>
<?php include("includes/header.php") ?>
<div class="container p-6">
    <div class="row">
        <div ckass="col-md-6 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <div class="form group">
                            <input name="id" class="form-control" placeholder="ID"><?php echo $id; ?></input>
                        </div>
                    <div class="<div class=" class="form-group">
                        <input type="text" name="firstname" value="<?php echo $firstname; ?>" class="form-control" placeholder="Update Employee">
                    </div>
                    <div class="<div class=" class="form-group">
                        <input type="text" name="lastname" value="<?php echo $lastname; ?>" class="form-control" placeholder="Update Employee Lastname">
                    </div>
                    <div class="form group">
                        <input type="text" name="city" class="form-control" placeholder="Update
                             City"><?php echo $city; ?></input>
                    </div>
                    <div class="form group">
                        <input type="text" name="email" class="form-control" placeholder="Update
                             Email"><?php echo $email; ?></input>
                        <div class="form group">
                            <input name="phone" class="form-control" placeholder="Update
                             Phone"><?php echo $phone; ?></input>
                        </div>
                        <div class="form group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Update
                             Description"><?php echo $description; ?></textarea>
                        </div>
                    </div>
                    <button class="btn btn-warning" name="update">
                        Update
                    </button>
                    <div class="card card-body">

                        <div id="id_employee">
                            <h3><strong>Last employee ID created:</strong></h3>
                            <?php
                            echo "{$id_remote}";
                            ?>
                            <h3><strong>Employee ID updated:</strong></h3>
                            <?
                            $value = "https://ICXCandidate:Welcome2021@imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts/{id}>"; 
                            echo "{$value}"; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>