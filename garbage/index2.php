<?php include("db.php") ?>
<?php

function ""mostrarDatos(){
    $url="C:/xampp/htdocs/php_crud_mysql/contacts.json"
    $datos = file_get_contents($url, true);
    $datos = json_decode($datos);
    $rs = $datos->items;

///////////////////////////////////
    foreach($rs as $persona){
        $id=$persona->id;
        echo "<tr><td >{$persona->id}</td>
            <td>{$persona->lookupName}</td>
                       </tr>";
                    
                }
            }
           
      
    


?>
<?php include("includes/header.php")?>

<div class="contaimer p-4">

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
            
                <form action="save.php" method="POST">
                
                    <div class="form group">
                    
                        <input type="text" name="title" class="form-control" 
                        
                        placeholder="Task Title" autofocus>

                        <textarea name="description" rows="2" class="form-control"
                        placeholder="Task description"></textarea>
                    
                    </div>

                        <input type="submit" class="btn btn-success btn-block"
                        name="save_task" value="Save Task">  
                
                </form>

            </div>    
        
        </div>

        <div class="col-md-8">
        
                <table class="table table-bordered">
                    <thead>
                    
                        <tr>
                        
                            <th> title </th>
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
                                <td> <?php echo $row['description']; ?></td> 
                                <td> <?php echo $row['created_at']; ?></td> 
                                <td> 
                                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">
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

<?php include("includes/footer.php")?>
  
