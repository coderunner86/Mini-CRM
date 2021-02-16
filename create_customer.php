<?php include("database/db.php") ?>
<?php include("includes/header.php") ?>
<div class="container p-2">
    <div class="row">
    <div class="col-sm-8">
            <div class="panel-heading"><strong>Customer <em>(i.e.)</em> people created by you</strong></div>
            <div class="panel-body">
                <p>Here you can find the customers (example) that you has been created. 
                You can also edit and delete one.
                These actions (Create, Update, Delete) will be performed into 
                the local customer database.
                </p>
            </div>
                <table class="table table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>id</th>
                            <th>Fullname</th>
                            <th>Phone</th>
                            <th>Description</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM customers";
                    $result_customers = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result_customers)) { ?>
                        <tr>
                            <td> <?php echo $row['id']; ?></td>
                            <td> <?php echo $row['fullname']; ?></td>
                            <td> <?php echo $row['customer_phone']; ?></td>
                            <td> <?php echo $row['description']; ?></td>
                            <td> <?php echo $row['created_at']; ?></td>
                            <td>
                                <a href="edit_customer.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">
                                    <!--Edit icon-->
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="delete_customer.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">
                                    <!--Delete icon-->
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
                <h2><em>Create new customer<em> <i class="fa fa-user"></i></i><h2>
                <form action="save_customer.php" method="POST">
                    <div class="form group">
                        <input type="text" name="firstname" class="form-control" placeholder="Employee name" autofocus>
                        <input type="number" name="customer_phone" class="form-control" placeholder="Phone" autofocus>
                        <textarea name="description" rows="2" class="form-control" placeholder="About"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_customer" value="Save customer" action="save_customer.php">
                </form>
            </div>
        </div>  
    </div>
</div>
<div class="container p-2">
    <div class="card card-body">   
            <em>Send a message to the customer</em>
                   
        <form action="send.php" method="POST">
            <div class="form group">
                <input type="number" name="phone" class="form-control" placeholder="Customer phone starting with country code like 573187654321" autofocus/>
                <input type="text" name="body" class="form-control" placeholder= "Body message" autofocus/>
            </div>        
            <input type="submit" class="btn btn-success btn-block" name="send" value="Send" action="send.php"/>
        </form>
    </div>
</div>


  
