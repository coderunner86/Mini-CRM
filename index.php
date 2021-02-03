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
       
       $createdTime=strtotime($employee->createdTime);
       $createdTime =date('d-m-Y', $createdTime);  
       echo "<tr>
            <td>{$employee->id}</td>
            <td>{$employee->lookupName}</td>
            <td nowrap>{$createdTime}</td>";

        $data = curl_init($employee->links[0]->href);
        $personal_data = autentication($data, $endpoint_username, $endpoint_password);         
        
        echo "<td>{$personal_data->address->city}</td>";

        $data_info = curl_init($personal_data->emails->links[0]->href);
        $contact_info = autentication($data_info, $endpoint_username, $endpoint_password);
        
        $data_info2 = curl_init($contact_info->items[0]->href);
        $contact_info2 = autentication($data_info2, $endpoint_username, $endpoint_password);
        echo "<td>{$contact_info2->address}</td>";

        $personal_data = autentication($data, $endpoint_username, $endpoint_password);         
        
        $personal_phones=curl_init($personal_data->phones->links[0]->href);
        $contact_phone = autentication($personal_phones, $endpoint_username, $endpoint_password);
        
        $data_info3 = curl_init($contact_phone->items[0]->href);
        $contact_info3 = autentication($data_info3, $endpoint_username, $endpoint_password);
        echo "<td>{$contact_info3->number}</td>";
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
                    
                        <input type="text" name="name" class="form-control" 
                        
                        placeholder="Employee name" autofocus>

                        <textarea name="description" rows="2" class="form-control"
                        placeholder="About"></textarea>

                        <input type="text" name="city" class="form-control" 
                        
                        placeholder="City" autofocus>

                        <input type="text" name="email" class="form-control" 
                        
                        placeholder="Email" autofocus>
                     
                        <input type="number" name="phone" class="form-control" 
                        
                        placeholder="Phone" autofocus>
                     
                    
                    
                    </div>

                        <input type="submit" class="btn btn-success btn-block"
                        name="save_employee" value="Save Employee">  
                
                </form>

            </div>    
        
        </div>

        <div class="col-md-8">
        
                <table class="table table-bordered">
                    <thead>                 
                        <tr>
                            <th>Employee </th>
                            <th>About employee</th>
                            <th>Created at</th>
                            <th>City</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                       <?php 
                       
                       $query = "SELECT * FROM employees";
                       $result_tasks = mysqli_query($conn, $query);

                       while($row = mysqli_fetch_array($result_tasks)) { ?>

                            <tr>
                                <td> <?php echo $row['name']; ?></td>  
                                <td> <?php echo $row['description']; ?></td> 
                                <td> <?php echo $row['createdTime']; ?></td> 
                                <td> <?php echo $row['city']; ?></td> 
                                <td> <?php echo $row['email']; ?></td> 
                                <td> <?php echo $row['phone']; ?></td> 
                                
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
  
