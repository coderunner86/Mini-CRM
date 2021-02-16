<?php 
    include("database/db.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id=$id";
        $result =  mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $customer = $row['customer'];
            $customer_phone = $row['customer_phone'];
            $description = $row['description'];           
        }
    }

    if (isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $customer = $_POST['customer'];
        $customer_phone = $_POST['customer_phone'];
        $description = $_POST['description'];
        $query = "UPDATE task set title = '$title', customer='$customer', customer_phone='$customer_phone', description='$description' WHERE id = $id;" ; 
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Task updated successfully';
        $_SESSION['message_type'] = 'warning';
        header("Location: index.php");
    }
?>

<?php include("includes/header.php") ?>

    <div class="container p-4">        
        <div class="row">
            <div ckass="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="<div class="form-group">               
                          <input type="text" name="title"  value="<?php echo $title; ?>" 
                          class="form-control" placeholder="Update task title">             
                        </div>"
                        <div class="<div class="form-group">
                          
                          <input type="text" name="customer"  value="<?php echo $customer; ?>" 
                          class="form-control" placeholder="Update customer fullname">

                          <input type="text" name="customer_phone"  value="<?php echo $customer_phone; ?>" 
                          class="form-control" placeholder="Update customer phone">
                         
                        </div>
                        <div class="form group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Update task
                             description"><?php echo $description; ?></textarea>
                        </div>
                        <button class="btn btn-success" name="update">
                            Update
                        </button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
?>
<?php include("includes/footer.php") ?>