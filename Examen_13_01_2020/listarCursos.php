<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Cursos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
    <?php

    ?>

    <div class="container-fluid">

        <div class="card">
            <div class="card-header"><a href="index.php"><strong>ForCan</strong></a><a href="nuevocurso.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Curso</a></div>
            <div class="card-body">
            </div>
        </div>


        <!--  Tabla que muestra todos los usuarios de la base de datos -->
        <div>

            <div class="row  ">
                <!--  Tabla que muestra todos los usuarios de la base de datos -->
                <!-- <div class="col-sm-2 ">
                </div> -->
                <div class="col-md-12  ">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="bg-primary text-white">
                                <!-- <th>ID</th> -->
                                <th>Nombre</th>
                                <th>lugar</th>
                                <th>modalidad</th>
                                <th>profesor_id</th>
                                <th>fecha de inicio</th>
                                <th>plazas</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require('App/Pro_CurDAO.php');
                            $cursos = new Pro_CurDAO();

                            if (isset($_GET['page'])) {
                                $currentPage = $_GET['page'];
                            } else {
                                $currentPage = 0;
                            }

                            $filasporpagina = 2;
                            $totalfilas = $cursos->countCursos();
                            $total_pages = intval($totalfilas / $filasporpagina);
                            $cursosList = $cursos->selectCursos($currentPage, $filasporpagina);


                            if ($cursosList != null) :
                                foreach ($cursosList as $row) :
                            ?>
                                    <tr>
                                        <td><?php echo $row->getNombre();
                                            ?></td>
                                        <td><?php echo $row->getLugar();
                                            ?></td>
                                        <td><?php echo $row->getModalidad();
                                            ?></td>
                                        <td><?php echo $row->getProfesor_Id();
                                            ?></td>
                                        <td><?php echo $row->getFecha_Inicio();
                                            ?></td>
                                        <td><?php echo $row->getPlazas();
                                            ?></td>
                                        <td align="center">
                                            <a href="actualizar.php?editId=<?php echo $row->getId(); ?>" class="text-primary" title="Editar"><i class="fa fa-fw fa-edit"></i></a> |
                                            <a href="borrar.php?delId=<?php echo $row->getId(); ?>" id="borrar" class="text-danger" title="Borrar"><i class="fa fa-fw fa-trash"></i></a>
                                            <?php // "borrar.php?delId=<?php echo $row->getId();" 
                                            ?>
                                            <!-- <input type="hidden" name="delId" value="<?php echo $row->getId(); ?>"> -->
                                        </td>
                                    </tr>
                            <?php endforeach;
                            endif;
                            ?>
                        </tbody>
                    </table>
                </div>

                    <!-- PAGINATION -->
                    <ul class="pagination">
                        <li><a href="?page=0">First</a></li>
                        <li class="<?php if ($currentPage <= 0) :
                                        echo 'disabled';
                                    endif; ?>">
                            <a href="<?php if ($currentPage < 1) :
                                            echo '#';
                                        else :
                                            echo "?page=" . ($currentPage - 1);
                                        endif; ?>">Prev</a>
                        </li>
                        <li class="<?php if ($currentPage >= $total_pages) :
                                        echo 'disabled';
                                    endif; ?>">
                            <a href="<?php if ($currentPage >= $total_pages) :
                                            echo '#';
                                        else :
                                            echo "?page=" . ($currentPage + 1);
                                        endif; ?>">Next</a>
                        </li>
                        <li><a href="?page=<?php echo $total_pages; ?>">Last</a></li>
                    </ul>


                </div>
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>