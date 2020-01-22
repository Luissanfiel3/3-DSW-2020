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

    use App\Autor;
    use App\Disco;
    // use PhpParser\Node\Stmt\Foreach_;

    include_once("../vendor/autoload.php");
    include_once('Config.php');
    include_once('Disco.php');
    include_once('Autor.php');

    $autores = new Autor();

    $errorMessage = "";
    $typeClass = "";

    // Obtenemos los datos de la tabla autor
    $autores =  App\Autor::select('id', 'nombre')
        ->orderBy('nombre')
        ->get();


    if (!empty($_POST)) {
        $editId = $_POST['updateId'];
        $nombre = $_POST['nombre'];
        $anyo = $_POST['anyo'];
        $idautor = $_POST['autorname'];
        $valid = true;

        // $filterDisc = App\Disco::select('nombre')->where('nombre', $nombre)->first();

        if (empty($nombre)) {
            $valid = false;
            echo "Insert a data";
        }
        if (empty($anyo)) {
            $valid = false;
            echo "Insert a data";
        }

        if ($valid == false) {
            echo "Fill in all the fields";
        } else {
            $discos = App\Disco::select('id', 'nombre', 'anyo', 'id_autor')->where('id', $editId)->get();
            //$disco = new Disco();
            foreach ($discos as $disco) {
                $disco->id;
                $disco->nombre = $nombre;
                $disco->anyo = $anyo;
                $disco->id_autor = $idautor;
                $disco->save();
                $typeClass = "alert alert-success";
                $errorMessage = "Disc edited successfully";
            }
        }
    } else {
        if (!empty($_GET['editId'])) {
            $editId = $_GET['editId'];
            $discos = App\Disco::select('id', 'nombre', 'anyo', 'id_autor')->where('id', $editId)->get();
        } else {
          //  echo "";
          $typeClass = "alert alert-danger";
          $errorMessage = "Cannot insert the disc";
        }
    }
    ?>
    <div class="container">

        <div class="row  justify-content-center">
            <div class="cold-md-4">
            </div>
            <div class="cold-md-auto">
                <h1 class="">EDIT DISC</h1>
            </div>
            <div class="cold-md-4">
            </div>
        </div>

        <div class="row ">
            <div class="col-md-4">
            </div>

            <div class="col-md-4 ">
                <?php

                foreach ($discos as $disco) : ?>
                    <form class="mt-2 form-horizontal justify-content-center " action="editar.php" method="post">
                        <input type="hidden" name="updateId" value="<?php echo $disco->id; ?>">
                        <input type="hidden" name="updateId" value="<?php echo $disco->id; ?>">
                        <div class="mt-2 control-group">
                            <label class="control-label">Nombre</label>
                            <div class="controls">
                                <input name="nombre" class="form-control" type="text" value="<?php echo $disco->nombre; ?>">
                            </div>
                        </div>
                        <div class="mt-2 control-group">
                            <label class="control-label">anyo</label>
                            <div class="controls">
                                <input name="anyo" class="form-control" type="text" value="<?php echo $disco->anyo; ?>">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="autor_name">Autores</label>
                            <select name="autorname" id="autor_name" class="form-control">

                                <?php foreach ($autores as $autor) : ?>
                                    <?php if ($disco->id_autor == $autor->id) : ?>
                                        <option selected value="<?php echo $autor->id; ?>"> <?php echo $autor->nombre;  ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo $autor->id;  ?>"> <?php echo $autor->nombre;   ?></option>
                                    <?php endif; endforeach; ?>

                            </select>
                        </div>
                        <div class="mt-3 form-actions">
                            <button type="submit" class="btn btn-success">SAVE</button>
                            <a class="btn btn-secondary" href="vistas/listar.php">CANCEL</a>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <br><br>
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
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</body>

</html>