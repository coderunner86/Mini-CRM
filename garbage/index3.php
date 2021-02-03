<?php include("db.php") ?>
<?php

function signo_zodiaco($fecha){ 
    $zodiaco = ''; 
          
    list ( $ano, $mes, $dia ) = explode ( "-", $fecha ); 
    
    if     ( ( $mes == 1 && $dia > 19 )  || ( $mes == 2 && $dia < 19 ) )  { $zodiaco = "Acuario"; }
    elseif ( ( $mes == 2 && $dia > 18 )  || ( $mes == 3 && $dia < 21 ) )  { $zodiaco = "Piscis"; } 
    elseif ( ( $mes == 3 && $dia > 20 )  || ( $mes == 4 && $dia < 20 ) )  { $zodiaco = "Aries"; } 
    elseif ( ( $mes == 4 && $dia > 19 )  || ( $mes == 5 && $dia < 21 ) )  { $zodiaco = "Tauro"; } 
    elseif ( ( $mes == 5 && $dia > 20 )  || ( $mes == 6 && $dia < 21 ) )  { $zodiaco = "Géminis"; } 
    elseif ( ( $mes == 6 && $dia > 20 )  || ( $mes == 7 && $dia < 23 ) )  { $zodiaco = "Cáncer"; } 
    elseif ( ( $mes == 7 && $dia > 22 )  || ( $mes == 8 && $dia < 23 ) )  { $zodiaco = "Leo"; } 
    elseif ( ( $mes == 8 && $dia > 22 )  || ( $mes == 9 && $dia < 23 ) )  { $zodiaco = "Virgo"; } 
    elseif ( ( $mes == 9 && $dia > 22 )  || ( $mes == 10 && $dia < 23 ) ) { $zodiaco = "Libra"; } 
    elseif ( ( $mes == 10 && $dia > 22 ) || ( $mes == 11 && $dia < 22 ) ) { $zodiaco = "Escorpio"; } 
    elseif ( ( $mes == 11 && $dia > 21 ) || ( $mes == 12 && $dia < 22 ) ) { $zodiaco = "Sagitario"; } 
    elseif ( ( $mes == 12 && $dia > 21 ) || ( $mes == 1 && $dia < 20 ) )  { $zodiaco = "Capricornio"; } 
    return $zodiaco; 
 }

function mostrarDatos(){
    $url = "C:/xampp/htdocs/php_crud_mysql/contacts.json";

    $datos = file_get_contents($url);
    $datos = json_decode($datos);
    $rs = $datos->results;
    $num=1;
    foreach($rs as $persona){
       # var_dump($persona);
       # exit();
       $fecha=strtotime($persona->dob->date);
       $zodiaco=signo_zodiaco(date('Y-m-d',$fecha));
       $fecha =date('d-m-Y', $fecha);
      
       echo "<tr>
             <td>{$num}</td>
            <td><img src = {$persona -> picture->thumbnail}>
            <td>{$persona->name->first}</td>
            <td>{$persona->name->last}</td>
            <td>{$persona->email}</td>
            <td nowrap>{$fecha}</td>
            <td>{$zodiaco}</td>
            <td>{$persona->dob->age}</td>
            <td>{$persona->nat}</td>
       </td></tr>";
       $num++;
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
  
