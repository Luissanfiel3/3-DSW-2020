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
<?php
require('connectionDB.php');
$conexion = new connectionDB();
$pdo =  $conexion->conectar();
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

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Indicamos que vaya a la excepcion
        $timestamp = date('Y-m-d H:i:s');

        $sql = "UPDATE usuarios"
            . " SET nombre =:nombre, edad = :edad , telefono = :telefono , email = :email , updated_at = :updated_at"
            . " WHERE id =:id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $editId);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':updated_at', $timestamp);
        try {
            $stmt->execute();
            echo  "La fila $editId ha sido modificada correctmanete ";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    $editId = $_GET['editId'];
    $sql = 'SELECT * '
        . 'FROM usuarios '
        . 'where id=:id';

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $_GET['editId']);
    try {
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        $nombre = $usuario['nombre'];
        $edad = $usuario['edad'];
        $telefono = $usuario['telefono'];
        $email = $usuario['email'];
        // Esto es para volver al mostrar la información en la misma página una vez efectuada la modificación

    } catch (Exception $e) {
        $sqlError = $e->getMessage();
        echo "erro al mostrar el usuario" . $e->getMessage();
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
                        <input name="nombre" class="form-control" type="text" value="<?php echo $nombre ?>">
                    </div>
                </div>
                <div class="mt-2 control-group">
                    <label class="control-label">Edad</label>
                    <div class="controls">
                        <input name="edad" class="form-control" type="text" value="<?php echo $edad ?>">
                    </div>
                </div>

                <div class="mt-2 control-group">
                    <label class="control-label">Teléfono</label>
                    <div class="controls">
                        <input name="telefono" class="form-control" type="text" value="<?php echo $telefono ?>">
                    </div>
                </div>

                <div class="mt-2 control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <input name="email" class="form-control" type="text" value="<?php echo $email ?>">
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

</html>