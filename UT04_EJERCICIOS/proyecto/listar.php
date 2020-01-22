<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
    <?php

    ?>

    <div class="container-fluid">

        <div class="card">
            <div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Luis CRUD</strong> <a href="crear.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Users</a></div>
            <div class="card-body">
            </div>
        </div>


        <!--  Tabla que muestra todos los usuarios de la base de datos -->
        <div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="bg-primary text-white">
                        <th>ID#</th>
                        <th>User Name</th>
                        <th>User Age</th>
                        <th>User Telefono</th>
                        <th>User Email</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require('app/UserDAO.php');
                    $users = new UserDAO();


                    if (isset($_GET['page'])) {
                        $currentPage = $_GET['page'];
                    } else {
                        $currentPage = 0;
                    }

                    $filasporpagina = 15;
                    $totalfilas = $users->countUsers();
                    $total_pages = intval($totalfilas / $filasporpagina);
                    $UserList = $users->selectUsers($currentPage, $filasporpagina);


                    if ($UserList != null) :
                        foreach ($UserList as $row) :
                    ?>
                            <tr>
                                <td><?php echo $row->getId();
                                    ?></td>
                                <td><?php echo $row->getNombre();
                                    ?></td>
                                <td><?php echo $row->getEdad();
                                    ?></td>
                                <td><?php echo $row->getTelefono();
                                    ?></td>
                                <td><?php echo $row->getEmail();
                                    ?></td>
                                <td><?php echo $row->getCreated_At();
                                    ?></td>
                                <td><?php echo $row->getUpdated_At();
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


            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>¿Desea borrar este usuario?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="hidden" name="delId" value="<?php  ?>">
                            <a href="borrar.php?delId=<? //echo $delId; 
                                                        ?>" class="text-danger" title="Save"><i class="fa fa-fw fa-trash"></i></a>
                        </div>
                    </div>
                </div>
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