
<?php include("database/db.php") ?>
<?php

if (isset($_POST["send"])){    
        $phone = $_POST['phone'];
        $body = $_POST['body'];
        $data = [
        'phone' => $phone , // Receptores telefonicos
        'body' => $body, // Mensaje
    ];
    $json = json_encode($data); // Codificar datos a JSON
    
   
// URL for request POST /message
$token = 'nrw9lz930jg91s4b';
$instanceId = '226800';
//$url = 'https://eu219.chat-api.com/instance226800/sendMessage?token=nrw9lz930jg91s4b';
$url = 'https://api.chat-api.com/instance'.$instanceId.'/message?token='.$token;
// Hacer una solicitud POST
$options = stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $json
    ]
]);

// Enviar una solicitud
$result = file_get_contents($url, false, $options);
$post_info = $result;
$query = "INSERT INTO chats(id, phone, body, post_info) VALUES ('$id', '$phone','$body', '$post_info')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query failed");
    }
$_SESSION['message'] = 'Message sent to the customer';
$_SESSION['message_type'] = 'success';
header("Location:create_customer.php");
}
//$_SESSION['message'] = 'Message could not be sent to the customer';
//$_SESSION['message_type'] = 'warning';
?>
