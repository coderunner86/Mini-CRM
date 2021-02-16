<?php include("database/db.php") ?>
<?php include("includes/header.php") ?>
Congratulation! You have logged into the Imagine Cx CRM Platform. 
<div class="contaimer p-4">
    <div class="panel-heading">
            <h2><em><strong>Task list</strong></em></h2>
            <div class="panel-body">
            <p><em>Here you can find the task that you have to do, create or delete one or more.</em></p></div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button> 
                </div>
           <?php session_unset();} ?> 
            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form group">
                        <input type="text" name="title" class="form-control" 
                        placeholder="Task Title" autofocus>
                        <input type="text" name="customer" class="form-control" 
                        placeholder="Customer full name" autofocus>
                        <input type="text" name="customer_phone" class="form-control" 
                        placeholder="Customer phone with country indicative" autofocus>
                        <textarea name="description" rows="2" class="form-control"
                        placeholder="Task description"></textarea>
                    </div>
                        <input type="submit" class="btn btn-success btn-block"
                        name="save_task" value="Save Task">  
                </form>
            </div>    
        </div>
        <div class="col-md-8">
             <div class="card card-border-success">
                <table class="table table-hover table-bordered">
                    <thead class="thead-light">
                        <tr><th> Title </th>
                            <th> Customer name</th>
                            <th> Customer phone</th>
                            <th> Description</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php 
                       $query = "SELECT * FROM task";
                       $result_tasks = mysqli_query($conn, $query);
                       while($row = mysqli_fetch_array($result_tasks)) { ?>
                            <tr>
                                <td> <?php echo $row['title']; ?></td>  
                                <td> <?php echo $row['customer']; ?></td>  
                                <td> <?php echo $row['customer_phone']; ?></td>  
                                <td> <?php echo $row['description']; ?></td> 
                                <td> <?php echo $row['created_at']; ?></td> 
                                <td> 
                                    <a href="edit_task.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">
                                        <!--Edit icon-->
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="delete_task.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
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
</div>
<?php include("includes/footer.php") ?>