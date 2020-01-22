<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<?php
require('connectionDB.php');
$errorMessage = "";
$typeClass = "";
if (!empty($_POST)) {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $valid = true;

    if (empty($nombre)) {
        $valid = false;
        //echo "Introduce el nombre";
        $errorMessage = "Introduce un dato";
       $typeClass = "alert alert-danger";
    }

    if (empty($edad)) {
        $valid = false;
       // echo "Introduce la edad";
       $errorMessage = "Introduce un dato";
       $typeClass = "alert alert-danger";
    }

    if (empty($email)) {
        $valid = false;
        //echo "Introduce el email";
        $errorMessage = "Introduce un dato";
        $typeClass = "alert alert-danger";
    }

    if ($valid == false) {
       // echo "Error al insertar";
       $errorMessage = "Error al Insertar";
    } else {
        $conexion = new connectionDB();
        $pdo =  $conexion->conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Indicamos que vaya a la excepcion

        $sql = "INSERT INTO usuarios (nombre,edad,telefono,email,created_at) values(?, ?, ?, ?, ?)";
        $q = $pdo->prepare($sql);
        $timestamp = date('Y-m-d H:i:s');
        try {
            $q->execute(array($nombre, $edad, $telefono, $email, $timestamp));
            echo "Usuario \"" . $nombre . "\" creado.";
        } catch (Exception $e) {
            $sqlError = $e->getMessage();
            echo "erro al insertar" . $e->getMessage();
        }
    }
}
?>

<body>
    <div class="container">
        <div class="row">
            <form class="mt-3 form-horizontal" action="crear.php" method="post">
                <div class="mt-2 control-group">
                    <label class="control-label">Nombre</label>
                    <div class="controls">
                        <input name="nombre" class="form-control" type="text" value="">
                    </div>
                </div>
                <div class="mt-2 control-group">
                    <label class="control-label">Edad</label>
                    <div class="controls">
                        <input name="edad" class="form-control" type="text" value="">
                    </div>
                </div>

                <div class="mt-2 control-group">
                    <label class="control-label">Teléfono</label>
                    <div class="controls">
                        <input name="telefono" class="form-control" type="text" value="">
                    </div>
                </div>

                <div class="mt-2 control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <input name="email" class="form-control" type="text" value="">
                    </div>
                </div>

                <div class="mt-3 form-actions">
                    <button type="submit" class="btn btn-success">Crear</button>
                    <a class="btn btn-secondary" href="listar.php">Volver</a>
                </div>
            </form>
        </div>
        <br>
        <div class ="row">
            <div class="<?php echo $typeClass; ?>" role="alert"> <?php echo  $errorMessage; ?></div>           
            </div>
          
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>