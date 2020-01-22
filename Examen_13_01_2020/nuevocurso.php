<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Cursos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row ">
            <p class="h3">Inserte un Usuario</p>
        </div>
        <?php
        require('app/Pro_CurDAO.php');
        $cursos = new Pro_CurDAO();
        $errorMessage = "";
        $typeClass = "";

        if (!empty($_POST)) {
            $nombre = $_POST['nombre'];
            $lugar = $_POST['lugar'];
            $modalidad = $_POST['modalidad'];
            $profesor_id = $_POST['profesor_id'];
            $plazas = $_POST['plazas'];
            $valid = true;

            if (empty($nombre)) {
                $valid = false;
                //echo "Introduce el nombre";
                $errorMessage = "Introduce un dato";
                $typeClass = "alert alert-danger";
            }

            if (empty($lugar)) {
                $valid = false;
                // echo "Introduce la edad";
                $errorMessage = "Introduce un dato";
                $typeClass = "alert alert-danger";
            }

            if (empty($modalidad)) {
                $valid = false;
                //echo "Introduce el email";
                $errorMessage = "Introduce un dato";
                $typeClass = "alert alert-danger";
            }

            if (empty($profesor_id)) {
                $valid = false;
                //echo "Introduce el email";
                $errorMessage = "Introduce un dato";
                $typeClass = "alert alert-danger";
            }

            if (empty($plazas)) {
                $valid = false;
                //echo "Introduce el email";
                $errorMessage = "Introduce un dato";
                $typeClass = "alert alert-danger";
            }


            if ($valid == false) {
                // echo "Error al insertar";
                $errorMessage = "Error al Insertar";
            } else {
                $curso = array("nombre" => $nombre, "lugar" => $lugar, "modalidad" => $modalidad, "profesor_id" => $profesor_id,"plazas" => $plazas);
                $cursos->insertCurso($curso);
            }
        }

        ?>


        <div class="row">
            <form class="mt-2 form-horizontal" action="nuevocurso.php" method="post">
                <div class="mt-2 control-group">
                    <label class="control-label">Nombre</label>
                    <div class="controls">
                        <input name="nombre" class="form-control" type="text" value="">
                    </div>
                </div>
                <div class="mt-2 control-group">
                    <label class="control-label">Lugar</label>
                    <div class="controls">
                        <input name="lugar" class="form-control" type="text" value="">
                    </div>
                </div>

                <div class="mt-2 control-group">
                    <label class="control-label">Modalidad</label>
                    <div class="controls">
                        <input name="modalidad" class="form-control" type="numeric" value="">
                    </div>
                </div>

                <div class="mt-2 control-group">
                    <label class="control-label">profesor_id</label>
                    <div class="controls">
                        <input name="profesor_id" class="form-control" type="text" value="">
                    </div>
                </div>

                <div class="mt-2 control-group">
                    <label class="control-label">Plazas</label>
                    <div class="controls">
                        <input name="plazas" class="form-control" type="text" value="">
                    </div>
                </div>
                <div class="mt-3 form-actions">
                    <button type="submit" class="btn btn-success">Crear</button>
                    <a class="btn btn-secondary" href="listarCusros.php">Volver</a>
                </div>
            </form>
        </div>
        <br>
        <div class="row">
            <div class="<?php echo $typeClass; ?>" role="alert"> <?php echo  $errorMessage; ?></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>