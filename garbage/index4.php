<?php include("db.php") ?>
<?php
function autentication($curl_init, $endpoint_username, $endpoint_password) {
    curl_setopt($curl_init, CURLOPT_USERPWD, $endpoint_username . ":" . $endpoint_password);  
    curl_setopt($curl_init, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl_init);
    
    if (curl_errno($curl_init)) {   
        throw new Exception(curl_error($curl_init));
    }

    return json_decode($response);  
}

function mostrarDatos() {
    $endpoint_username = 'ICXCandidate';
    $endpoint_password = 'Welcome2021';
    $endpoint = "https://imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts";
    $data = curl_init($endpoint);
    
    $employees = autentication($data, $endpoint_username,$endpoint_password);
    
    foreach ($employees->items as $employee) {
       
       $fecha_1=strtotime($employee->createdTime);
       $fecha_1 =date('d-m-Y', $fecha_1);  
       $fecha_2=strtotime($employee->updatedTime);
       $fecha_2 =date('d-m-Y', $fecha_2);
      
       echo "<tr>
            <td>{$employee->id}</td>
            <td>{$employee->lookupName}</td>
            <td nowrap>{$fecha_1}</td>
            <td nowrap>{$fecha_2}</td>";

        $data = curl_init($employee->links[0]->href);
        $personal_data = autentication($data, $endpoint_username, $endpoint_password);        
        
           
        echo "<td>{$personal_data->address->city}</td></tr>";
                
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
  
