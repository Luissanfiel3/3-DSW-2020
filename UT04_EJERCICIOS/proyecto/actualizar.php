<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
    <?php
    require('app/UserDAO.PHP');
    $user = new UserDAO();
    $errorMessage = "";

    if (!empty($_POST)) {
        $editId = $_POST['editId'];
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $valid = true;

        if (empty($nombre)) {
            $valid = false;
            echo "Has borrado el nombre";
        }
        if (empty($edad)) {
            $valid = false;
            echo "Has borrado la edad";
        }
        if (empty($email)) {
            $valid = false;
            echo "Has borrado el email";
        }


        // Faltan el resto de validaciones
        if ($valid == false) {
            echo "Error al actualizar";
        } else {
            //$user = array("nombre" => $nombre, "edad" => $edad, "telefono" => $telefono, "email" => $email);
            $editUser = ["id" => $editId, "nombre" => $nombre, "edad" => $edad, "telefono" => $telefono, "email" => $email];
            $user->updateUser($editUser);
        }
    } else {
        if (!empty($_GET['editId'])) {
            $editId = $_GET['editId'];
            $filterUser = $user->selectUsersById($editId);
            $nombre = $filterUser->getNombre();
            $edad = $filterUser->getEdad();
            $telefono = $filterUser->getTelefono();
            $email = $filterUser->getEmail();
            // Esto es para volver al mostrar la información en la misma página una vez efectuada la modificación
        } else {
            echo "No se puede econtrar el suario";
        }

    }
    ?>

    <body>
        <div class="container">
            <div class="row">
                <form class="mt-3 form-horizontal" action="actualizar.php" method="post">
                    <input type="hidden" name="editId" value="<?php echo $editId; ?>" />
                    <div class="mt-2 control-group">
                        <label class="control-label">Nombre</label>
                        <div class="controls">
                            <input name="nombre" class="form-control" type="text" value="<?php echo $nombre ?>" required>
                        </div>
                    </div>
                    <div class="mt-2 control-group">
                        <label class="control-label">Edad</label>
                        <div class="controls">
                            <input name="edad" class="form-control" type="text" value="<?php echo $edad ?>" required>
                        </div>
                    </div>

                    <div class="mt-2 control-group">
                        <label class="control-label">Teléfono</label>
                        <div class="controls">
                            <input name="telefono" class="form-control" type="tel" value="<?php echo $telefono ?>" required>
                        </div>
                    </div>

                    <div class="mt-2 control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input name="email" class="form-control" type="email" value="<?php echo $email ?>" required>
                        </div>
                    </div>

                    <div class="mt-3 form-actions">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a class="btn btn-secondary" href="listar.php">Volver</a>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</body>

</html>