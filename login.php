
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagine CX CRM</title>
    <!--Bootsrap4 CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="C:/xampp/htdocs/php_crud_mysql/css/style.css">
    <!-- FONT AWESOME 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-brand p-4">
                    
                <div class="logo">
                    <img src="https://dscbucket.s3-sa-east-1.amazonaws.com/logo_recorte.JPG">
                    <a class="navbar-brand">Imagine-CX Customer Relationships Managment Platform</a>
                    
                </div>
        </div>
    </nav>
<style>
/* Style all input fields */
input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

/* Style the submit button */
input[type=submit] {
  background-color: orangered;
  color: white;
}

/* Style the container for inputs */
.container {
  background-color: #f1f1f1;
  padding: 20px;
}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>
</head>
<body>
<div class="card card-body">   
    <form action="" method="post" name="Login_Form">
    <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
        <?php if(isset($msg)){?>
        <tr>
        <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
        </tr>
        <?php } ?>
        <tr>
        <td colspan="2" align="left" valign="top"><h3>Login</h3></td>
        </tr>
        <tr>
        <td align="right" valign="top">Username</td>
        <td><input name="Username" type="text" class="Input"></td>
        </tr>
        <tr>
        <td align="right">Password</td>
        <td><input name="Password" type="password" class="Input"></td>
        </tr>
        <tr>
        <td> </td>
        <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
        </tr>
    </table>
    </form>
    </div>

<?php 
//session_start(); /* Starts the session */
/* Check Login form submitted */
if(isset($_POST['Submit'])){ 
/* Define username and associated password array */
$logins = array('ICXCandidate' => 'Welcome2021','Jhesus' => 'JobCandidate2021','username' => 'Pass123456');

/* Check and assign submitted Username and Password to new variable */
$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

/* Check Username and Password existence in defined array */
if (isset($logins[$Username]) && $logins[$Username] == $Password){
/* Success: Set session variables and redirect to Protected page  */
$_SESSION['UserData']['Username']=$logins[$Username];
header("location:index.php");
exit;
} else {
/*Unsuccessful attempt: Set error message */
$msg="<span style='color:red'>Invalid Login Details</span>";
}
}
?>