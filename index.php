<?php include("db.php") ?>
<?php include("mostrarDatos.php") ?>
<?php include("includes/header.php") ?>

<div class="contaimer p-4">
    <div class="row">
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
                    <input type="submit" class="btn btn-success btn-block" name="save_employee" value="Save Employee">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table-responsive">
                <thead>
                    <tr>
                        <th>Employee name </th>
                        <th>Surname</th>
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
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-orange">
                                    <!--Edit icon-->
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
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