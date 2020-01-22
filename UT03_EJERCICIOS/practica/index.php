<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
    <!-- Tabla Principal que muestra todos los usuarios -->
    <div class="container-fluid bg-light ">
        <div class="">
            <div class="h1 text-center">Listado de Usuarios</div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="bg-primary text-white">
                        <th>ID</th>
                        <th>Name</th>
                        <th>User Name</th>
                        <th> Email</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require "data.php";
                    foreach ($userList as $user) {
                        ?>
                        <tr>
                            <td><?php echo $user->__getId();  ?></td>
                            <td><?php echo $user->__getName();    ?></td>
                            <td><?php echo $user->__getUserName();   ?></td>
                            <td><?php echo $user->__getEmail();   ?></td>
                            <td align="center">
                                <a href="perfil.php?userId=<?php echo $user->__getId(); ?>" class="text-primary"><i class="fas fa-user fa-lg"></i></a>
                                <a href="tareas.php?userId=<?php echo $user->__getId(); ?>" class="text-danger"><i class="fas fa-tasks fa-lg"></i></a>
                            </td>
                        </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>