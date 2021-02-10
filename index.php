<?php include("database/db.php") ?>
<?php include("mostrarDatos.php") ?>
<?php include("post_info.php") ?>
<?php include("includes/header.php") ?>
<div class="container p-4">
    <div class="container">
        <div class="col-md-4">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            <?php session_unset();
            } ?>
            <div class="card card-body">
                <form action="save.php" method="POST">
                    <div class="form group">
                        <input type="text" name="firstname" class="form-control" placeholder="Employee name" autofocus>
                        <input type="text" name="lastname" class="form-control" placeholder="Employee surname" autofocus>
                        <input type="text" name="city" class="form-control" placeholder="City" autofocus>
                        <input type="text" name="email" class="form-control" placeholder="Email" autofocus>
                        <input type="number" name="phone" class="form-control" placeholder="Phone" autofocus>
                        <textarea name="description" rows="2" class="form-control" placeholder="About"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save" value="Save Employee" action="save.php">
                </form>
        
                <div class="card card-body">
               
                    <div >
                        <h3><strong>Last employee ID created:</strong></h3>
                        <?php
                        $endpoint_username = 'ICXCandidate';
                        $endpoint_password = 'Welcome2021';
                        $endpoint = "https://ICXCandidate:Welcome2021@imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts";
                        //$endpoint='https://ICXCandidate:Welcome2021@imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts/?q=id';
                        $data = curl_init($endpoint);
                        $employees = autentication($data, $endpoint_username, $endpoint_password);
                        foreach ($employees->items as $employee) {
                        }
                        $id_employee = $employee->id;
                        echo "{$id_employee}";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="container">
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Lastname</th>
                        <th>Created at</th>
                        <th>City</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM employees";
                    $result_tasks = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result_tasks)) { ?>
                        <tr>
                            <td> <?php echo $row['firstname']; ?></td>
                            <td> <?php echo $row['lastname']; ?></td>
                            <td> <?php echo $row['createdTime']; ?></td>
                            <td> <?php echo $row['city']; ?></td>
                            <td> <?php echo $row['email']; ?></td>
                            <td> <?php echo $row['phone']; ?></td>
                            <td> <?php echo $row['description']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id_remote']; ?>" class="btn btn-warning">
                                    <!--Edit icon-->
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">
                                    <!--Delete icon-->
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("includes/footer.php") ?>