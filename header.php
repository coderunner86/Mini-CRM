<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagine CX CRM</title>
    <!--Bootsrap4-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- FONT AWESOME 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" src="C:/xampp/htdocs/php_crud_mysql/css/style.css">
    <script text="javascript">
        const url = 'https://imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts';
        let data = {
            "name": {
                "first": "Alejandro",
                "last": " Dumas"
            }
        };
        async function postData(url, data) {
            // Opciones por defecto estan marcadas con un *
            const response = await fetch(url, {
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                mode: 'cors', // no-cors, *cors, same-origin
                cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                credentials: 'same-origin', // include, *same-origin, omit
                headers: {
                    'Content-Type': 'application/json'
                    // 'Content-Type': 'application/x-www-form-urlencoded',
                },
                redirect: 'follow', // manual, *follow, error
                referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
                body: JSON.stringify(data) // body data type must match "Content-Type" header
            });
            return response.json(); // parses JSON response into native JavaScript objects
            console.log(data);
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="logo">
            <img src="img/logo_recorte.jpg">
        </div>
        <div class="container-brand">
            <a href="index.php" class="navbar-brand">Imagine-CX Customer Relationships Managment Platform</a>
        </div>
    </nav>