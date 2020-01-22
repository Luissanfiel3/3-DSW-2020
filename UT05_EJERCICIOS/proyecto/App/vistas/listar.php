<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DISCOS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>

<body>
    <?php

    use App\Disco;

    ?>

    <div class="container-fluid secondary">

        <div class="card">
            <div class="card-header "><i class="fa fa-fw fa-globe"></i> <strong>Luis CRUD</strong>
                <a href="nuevo_disco.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> New Disc</a>
                <a href="nuevo_autor.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> New Autor</a>
            </div>
            <div class="card-body">
            </div>
        </div>

        <div class="row  ">
            <!--  Tabla que muestra todos los usuarios de la base de datos -->
            <div class="col-sm-2 ">
            </div>
            <div class="col-md-8 justify-content-center  ">
                <table class="table table-striped table-bordered text-center ">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th> Name</th>
                            <th>Year</th>
                            <th>Autor</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include_once("../../vendor/autoload.php");
                        include_once('../Config.php');
                        include_once('../Autor.php');
                        include_once('../Disco.php');



                        if (isset($_GET['page'])) {
                            $currentPage = $_GET['page'];
                        } else {
                            $currentPage = 0;
                        }


                        $filasporpagina = 10;
                        $totalfilas = App\Disco::count();
                        $total_pages = intval($totalfilas / $filasporpagina);
                        $offset = $currentPage * $filasporpagina;

                        // Listado con paginación
                        $discos = App\Disco::offset($offset)->limit($filasporpagina)->get();
                        // Obtenemos los datos de la tabla autor
                        $autores =  App\Autor::select('id', 'nombre')
                            ->orderBy('nombre')
                            ->get();

                        foreach ($discos as $disco) {
                        ?>
                            <tr>
                                <td><?php echo $disco->nombre;
                                    ?></td>
                                <td><?php echo $disco->anyo;
                                    ?></td>

                                <td><?php
                                    foreach ($autores as $autor) {
                                        if ($disco->id_autor == $autor->id) {
                                            echo $autor->nombre;
                                        }
                                    }
                                    ?>
                                </td>
                                <td align="center">
                                    <a href="../borrar.php?delId=<?php echo $disco->id ?>" class="text-danger" title="Borrar"><i class=" fa fa-fw fa-trash"></i></a>&nbsp;
                                    <a href="../editar.php?editId=<?php echo $disco->id; ?>" class="text-info" title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php
                        }   ?>
                    </tbody>
                </table>
            </div>

        </div class="row">
        <div class="col-md-1">
            <p class="border border-dark bg-success text-white ">&nbsp Page: <?php echo  $currentPage; ?></p>
        </div>
        <div class="col-md-auto">
        </div>
        <!-- PAGINATION -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-link"><a href="?page=0">First</a>
                </li>
                <li class="<?php if ($currentPage <= 0) {
                                echo 'page-item  ';
                            } else {
                                echo "page-item ";
                            } ?>">
                    <a class="page-link" href="<?php if ($currentPage < 1) {
                                                    echo '#';
                                                } else {
                                                    echo "?page=" . ($currentPage - 1);
                                                } ?>">Prev</a>
                </li>
                <!-- Números de Página -->
                <?php for ($i = 0; $i <= $total_pages; $i++) :  ?>
                    <li class="page-item"> <a class="page-link " href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>

                <li class="<?php if ($currentPage >= $total_pages) {
                                echo 'page-item';
                            } else {
                                echo "page-item";
                            } ?>">
                    <a class="page-link" href="<?php if ($currentPage >= $total_pages) {
                                                    echo '#';
                                                } else {
                                                    echo "?page=" . ($currentPage + 1);
                                                } ?>">Next</a>
                </li>
                <li class="page-item "><a class="page-link" href="?page=<?php echo $total_pages; ?>">Last</a></li>
            </ul>

        </nav>
        <!-- </div> -->
        <script type="text/javascript">
            // $(function() { //run when the DOM is ready
            //     $(".clickable").click(function() { //use a class, since your ID gets mangled
            //         $(".clickable").removeClass("active");
            //         $(this).addClass("active"); //add the class to the clicked element
            //     });
            // });
        </script>

    </div>
    </div>


    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>