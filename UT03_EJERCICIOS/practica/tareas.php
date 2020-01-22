<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tareas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>

    <?php

    use function GuzzleHttp\json_decode;

    require 'vendor/autoload.php';
    require 'todo.php';
    $idProfile;

    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/todos?userId=' . $_GET['userId']);
    $responseServer = $response->getStatusCode(); # 200
    //echo $response->getHeaderLine('content-type'); # 'application/json; charset=utf8'
    //echo $response->getBody(); # '{"id": 1420053, "name": "guzzle", ...}'

    if ($responseServer == 200) {
        $task_array = $response->getBody()->getContents();
        $taskList = json_decode($task_array, true);

        $myTaskList = array();

        foreach ($taskList as $task) {
            $userId = $task['userId'];
            $newTask = new Todo($task['userId'], $task['id'], $task['title'], $task['completed']);
            array_push($myTaskList, $newTask);
        } ?>

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php" title="Inicio"><i class="fas fa-home fa-2x"></i></a>
                <a href="perfil.php?userId=<?php echo $userId; ?>" class="view overlay"><i class="fas fa-user fa-2x"></i></a>
            </nav>
            <!-- Tabla de Con todas las tareas -->
            <table class="table">
                <thead>
                    <tr class="bg-primary text-white">
                        <th>userId</th>
                        <th>Id</th>
                        <th>Title</th>
                        <th> Progress</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($myTaskList as $value) {

                            ?>
                        <tr>
                            <td><?php echo $value->__getUserId();  ?></td>
                            <td><?php echo $value->__getId();    ?></td>
                            <td><?php echo $value->__getTitle();   ?></td>
                            <td><?php if ($value->__getCompleted() == true) {
                                            echo "Completed";
                                        } else {
                                            echo "uncompleted";
                                        }
                                        ?></td>
                        </tr>
                    <?php
                        } ?>
                </tbody>
            </table>

        <?php } else {
            echo "<h1>Fallo de conexión con a base de datos </h1>";
        } ?>

        </div>
</body>

</html>