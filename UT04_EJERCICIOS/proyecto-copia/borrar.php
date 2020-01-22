
    <?php

    // Obtenemos la conexión
    require('connectionDB.php');
    $conexion = new connectionDB();
    $pdo =  $conexion->conectar();
    if (!empty($_GET['delId'])) {
        $id = $_GET['delId'];
        $sql = "DELETE  FROM usuarios WHERE id=$id";
        $stmt = $pdo->prepare($sql);
        try {
            $stmt->execute(array($id));
        } catch (Exception $e) {
            header('Error al borrar el usuario ' . $e->getMessage());
        }
    }
   
    ?>
