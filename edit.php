<?php
include("database/db.php");
$id = $_GET['id'];
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
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    $id_remote = $_POST['id_remote'];
    $query = "UPDATE employees set firstname = '$firstname', lastname='$lastname', city='$city', email='$email', phone='$phone', description='$description', id = '$id', id_remote = '$id_remote';";
    mysqli_query($conn, $query);
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    $my_array_data = array("name" => array("first" => $firstname, "last" => $lastname), "address" => array("city" => $city), "emails" => array("address" => $email, "addressType" => array("id" => 0)), "phones" => array("number" => $phone, "phoneType" => array("id" => 0)));
    $data = json_encode($my_array_data); 
    $value = $id;
    $url = "https://ICXCandidate:Welcome2021@imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts/$value"; 
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
    echo "<table>
                <tr>
                <tr>UPDATE EMPLOYEE</tr>
                <td>DATA:</td>
                <td>$data</td>
                </tr><tr>
                <td>ID<td>
                <td>$value</td>
                </tr>
            </table>";
    $_SESSION['message'] = 'Employee update success'; 
    $_SESSION['message_type'] = 'warning';
    header("Location: index.php");
}
?>
<?php include("includes/header.php") ?>
<div class="container">
    <div class="panel panel-default">
            <div class="panel-heading"><em><strong>Update contact</strong></em></div>
            <div class="panel-body">
                <body class="table table-hover table-bordered">
                        <text type="number" name="id" min="1" max="5000" value="<?php echo (isset($_GET['id']) ? $_GET['id'] : '') ?>"  />
                            <?php
                            $value = htmlspecialchars($_GET['id']);
                            $url = "https://ICXCandidate:Welcome2021@imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts/$value"; 
                            echo "<table>
                                <tr>
                                <td>ID:</td>
                                <td>$value</td>
                                </tr><tr>
                                <td>PATH<td>
                                <td>$url</td>
                                </tr>               
                            </table>";
                            ?>
                </body>
            </div>
            </div>
    <div class="row">
        <div ckass="col-md-6 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <div class="form group">
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
                </form>
            </div>
        </div>
    </div>
</div>