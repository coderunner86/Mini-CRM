<?php include("database/db.php") ?>
<?php include("autentication.php") ?>
<?php include("includes/header.php") ?>
<div class="container p-2">
    <div class="row">
    <div class="col-sm-8">
            <div class="panel-heading"><strong>Contacts <em>(Employees)</em> created by you</strong></div>
            <div class="panel-body">
                <p>Here you can find the contacts that you has been created. 
                You can also edit and delete one.
                These actions (Create, Update, Delete) will be performed into 
                the remote and local databases.
                </p>
            </div>
                <table class="table table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>id</th>
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
                    $result_employees = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result_employees)) { ?>
                        <tr>
                            <td> <?php echo $row['id']; ?></td>
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
                              remote       <!--Delete icon-->
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-4">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert"> 
                    <?= $_SESSION['message']; ?>
                </div>
            <?php session_unset();} ?>
            <div class="card card-body">
                <h2><em>Create new contact<em> <i class="fa fa-address-card"></i></i><h2>
                <form action="save.php" method="POST">
                    <div class="form group">
                        <input type="text" name="firstname" class="form-control" placeholder="Employee name" autofocus>
                        <input type="text" name="lastname" class="form-control" placeholder="Employee surname" autofocus>
                        <input type="text" name="city" class="form-control" placeholder="City" autofocus>
                        <input type="text" name="email" class="form-control" placeholder="Email" autofocus>
                        <input type="number" name="phone" class="form-control" placeholder="Phone" autofocus>
                        <textarea name="description" rows="2" class="form-control" placeholder="About"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save" value="Save Contact" action="save.php">
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container p-2">
    <div class="card card-body">   
            <div class="panel panel-default">
                <div class="panel-heading"><em>Last contact created</em></div>
                <div class="panel-body">
                <?php
                $endpoint_username = 'ICXCandidate';
                $endpoint_password = 'Welcome2021';
                $endpoint = "https://ICXCandidate:Welcome2021@imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts";
                $data = curl_init($endpoint);
                $employees = autentication($data, $endpoint_username, $endpoint_password);
                foreach ($employees->items as $employee) {
                }
                $id = $employee->id;
                $firstname = $employee->lookupName;
                echo "<td>{$id}</td>";
                echo "<td>{$firstname}</td>";
                echo "<td>{$employee->createdTime}</td>";
                ?>
                </div>
            </div>
    </div>  
</div>


  
