<?php
include("db.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM employees WHERE id=$id";
    $result =  mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row['firstname'];
        $lastname = $row['lastname'];
        $city = $row['city'];
        $email = $row['email'];
        $phone = $row['phone'];
        $name = $row['id'];
        $description = $row['description'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $name = $_POST['firstname'];
    $name = $_POST['lastname'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];

    $query = "UPDATE employees set title = '$name', description='$description', lastname='$lastname', city='$city', email='$email', phone='$phone', WHERE id = $id;";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Employee update success';
    $_SESSION['message_type'] = 'warning';
    header("Location: index.php");
}
?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div ckass="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="<div class=" class="form-group">
                        <input type="text" name="firstname" value="<?php echo $name; ?>" class="form-control" placeholder="Update Employee">
                    </div>
                    <div class="<div class=" class="form-group">
                        <input type="text" name="lastname" value="<?php echo $lastname; ?>" class="form-control" placeholder="Update Employee Lastname">
                    </div>
                    <div class="form group">
                        <input name="city" class="form-control" placeholder="Update
                             City"><?php echo $city; ?></input>
                    </div>
                    <div class="form group">
                        <input name="email" class="form-control" placeholder="Update
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

<?php include("includes/footer.php") ?>