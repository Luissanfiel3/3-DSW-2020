<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Autores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row ">
            <p class="h3">Inserte un nuevo Autor</p>
        </div>

        <?php

        use App\Autor;

        include_once("../../vendor/autoload.php");
        include_once('../Config.php');
        include_once('../Autor.php');


        $autor = new Autor();


        $errorMessage = "";
        $typeClass = "";

        if (!empty($_POST)) {
            $nombre = $_POST['nombre'];
            $estilo = $_POST['estilo'];

            // Comprobamos si nuestro usuario ya existe en base de datos
            $filterAutor = App\Autor::select('nombre')->where('nombre', $nombre)->first();

            $valid = true;

            if (empty($nombre)) {
                $valid = false;
                //echo "Introduce el nombre";
                $errorMessage = "Enter a data";
                $typeClass = "alert alert-danger";
            }

            if (empty($estilo)) {
                $valid = false;
                //echo "Introduce el nombre";
                $errorMessage = "Enter a data";
                $typeClass = "alert alert-danger";
            }

            if ($valid == false) {
                $errorMessage = "Error on Insertion";
                $typeClass = "alert alert-danger";
            } else {
                if ($filterAutor != null) {
                    $typeClass = "alert alert-danger";
                    $errorMessage = "The author already exists";
                } else {
                    // Obtenemos los datos de la tabla autor
                    $autor->nombre = $nombre;
                    $autor->estilo = $estilo;
                    $autor->save();
                    $typeClass = "alert alert-success";
                    $errorMessage = "Author created successfully";
                }
            }
        }

        ?>

        <div class="row  justify-content-center">
            <div class="cold-md-3">
            </div>
            <div class="cold-md-auto">
                <h1 class="">NEW AUTOR</h1>
            </div>
            <div class="cold-md-3">
            </div>
        </div>

        <div class="row">
            <div class=" col-md-auto ">
                <form class="mt-2 form-horizontal" action="nuevo_autor.php" method="post">
                    <div class="mt-2 control-group">
                        <label class="control-label">Nombre</label>
                        <div class="controls">
                            <input name="nombre" class="form-control" type="text" value="">
                        </div>
                    </div>
                    <div class="mt-2 control-group">
                        <label class="control-label">Estilo</label>
                        <div class="controls">
                            <input name="estilo" class="form-control" type="text" value="">
                        </div>
                    </div>

                    <div class="mt-3 form-actions">
                        <button type="submit" class="btn btn-success">SAVE</button>
                        <a class="btn btn-secondary" href="listar.php">CANCEL</a>
                    </div>
                </form>
            </div>
            <div class=" col-md-3 ">
            </div>
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