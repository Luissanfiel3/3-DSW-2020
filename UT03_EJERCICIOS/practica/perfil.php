<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
    <style>
        /*CSS par la tarjeta*/
        .card {
            box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
            margin-top: 10px;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

        .task {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
        }

        .task:hover,
        a:hover {
            opacity: 0.7;
        }
    </style>

    <?php
    /**Consultar datos de usuario filtrado por ID a la API */

    require "user.php";
    use function GuzzleHttp\json_decode;
    require 'vendor/autoload.php';


    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/users?id=' . $_GET['userId']);
    $responseServer = $response->getStatusCode(); # 200
    //echo $response->getHeaderLine('content-type'); # 'application/json; charset=utf8'
    //echo $response->getBody(); # '{"id": 1420053, "name": "guzzle", ...}'

    if ($responseServer == 200) {
        $user_array = $response->getBody()->getContents();
        $userList = json_decode($user_array, true);
        // El servicio web devuelve una lista de una elemento
        $user = $userList[0];
        ?>
        <div class="container-fluid bg-info">
            <div class="card  ">
                <img class="fa fa-align-justify" src="https://upload.wikimedia.org/wikipedia/commons/3/38/Wikipedia_User-ICON_byNightsight.png" alt="" style="width:100%">
                <h1><?php echo $user['name']; ?></h1>
                <p class="title"><?php echo  $user['username']; ?></p>
                <p>Address: <?php echo  $user['address']['street'] . " - " . $user['address']['suite'] . " - " . $user['address']['city'] . " <br> Postal code: " . $user['address']['zipcode'] . "<br> latitude: "
                                    . $user['address']['geo']['lat'] . " longitude " . $user['address']['geo']['lng']; ?> </p>
                <p><i class="fas fa-phone"></i>: <?php echo  $user['phone']; ?></p>
                <p><i class="fab fa-google"></i>: <?php echo  $user['website']; ?></p>
                <p><i class="fas fa-building">Company:</i>: <?php echo  $user['company']['name']; ?></p>
                <p>CatchPhrase: <?php echo  $user['company']['catchPhrase']; ?></p>
                <div style="margin: 24px 0;">
                    <a href="#"><i class="fas fa-envelope">: <?php echo  $user['email']; ?></i></a>
                </div>

                <p><a href="tareas.php?userId=<?php echo $user['id']; ?>" class="task ">Task</a></p>
                <p><a href="index.php" class="task ">Inicio</a></p>
            </div>
        </div>
    <?php } else { ?>
        echo "<h1>Fallo de conexión con la base de datos </h1>";
    <?php } ?>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>