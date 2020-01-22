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

<body>
    <div class="container">      

        <?php

        use App\Autor;
        use App\Disco;

        include_once("../../vendor/autoload.php");
        include_once('../Config.php');
        include_once('../Disco.php');
        include_once('../Autor.php');

        $autores = new Autor();

        $errorMessage = "";
        $typeClass = "";

        // Obtenemos los datos de la tabla autor
        $autores =  App\Autor::select('id', 'nombre')
            ->orderBy('nombre')
            ->get();



        if (!empty($_POST)) {
            $nombre = $_POST['nombre'];
            $anyo = $_POST['anyo'];
            $idautor = $_POST['autorname'];

            //Comprobar si el nombre que introducimos ya existe en la base de datos
            $filterDisc = App\Disco::select('nombre')->where('nombre', $nombre)->first();


            $valid = true;

            if (empty($nombre)) {
                $valid = false;
                //echo "Introduce el nombre";
                $errorMessage = "Error on insertion";
                $typeClass = "alert alert-danger";
            }

            if (empty($anyo)) {
                $valid = false;
                //echo "Introduce el nombre";
                $errorMessage = "Enter a data";
                $typeClass = "alert alert-danger";
            }

            if (empty($idautor)) {
                $valid = false;
                $errorMessage = "Enter a data";
                $typeClass = "alert alert-danger";
            }

            if ($valid == false) {
                $errorMessage = "Error on insertion";
            } else {
                if ($filterDisc != null) {
                    $typeClass = "alert alert-danger";
                    $errorMessage = "The disc already exists";
                } else {
                    $disco = new Disco();
                    $disco->nombre = $nombre;
                    $disco->anyo = $anyo;
                    $disco->id_autor = $idautor;
                    $disco->save();
                    $typeClass = "alert alert-success";
                    $errorMessage = "Disc created successfully";
                }
            }
        }
        ?>
        <div class="row  justify-content-center">
            <div class="cold-md-3">
            </div>
            <div class="cold-md-auto">
                <h1 class="">NEW DISC</h1>
            </div>
            <div class="cold-md-3">
            </div>
        </div>

        <div class="row">
            <div class=" col-md-5 ">
            </div>
            <div class=" col-md-auto ">
                <form class="mt-2 form-horizontal" action="nuevo_disco.php" method="post">
                    <div class="mt-2 control-group">
                        <label class="control-label">Nombre</label>
                        <div class="controls">
                            <input name="nombre" class="form-control" type="text" value="">
                        </div>
                    </div>
                    <div class="mt-2 control-group">
                        <label class="control-label">anyo</label>
                        <div class="controls">
                            <input name="anyo" class="form-control" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="autor_name">Autores</label>
                        <select name="autorname" id="autor_name" class="form-control">
                            <?php foreach ($autores as $autor) { ?>
                                <option value="<?php echo $autor->id; ?>"><?php echo $autor->nombre; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mt-4  form-actions">
                        <button type="submit" class="btn btn-success">SAVE</button>
                        <a class="btn btn-secondary" href="listar.php">CANCEL</a>
                    </div>
                </form>
            </div>
            <div class="col-md-5">
            </div>
        </div>
        <div class="row justify-content-center-md-center">
            <div class=" col-md-4 ">
            </div>
            <div class="col-md-auto">
                <div class="<?php echo $typeClass; ?>" role="alert"> <?php echo  $errorMessage; ?></div>
            </div>
            <div class=" col-md-4 ">
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>