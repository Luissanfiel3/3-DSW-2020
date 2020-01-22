<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listar Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

<body>
    <?php

    require("connectionDB.php");

    ?>
    <div class="container-fluid">

        <div class="card">
            <div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse User</strong> <a href="crear.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Users</a></div>
            <div class="card-body">

                <!-- <div class="col-sm-12">
                    <h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find User</h5>
                    <form method="get">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($_REQUEST['username']) ? $_REQUEST['username'] : '' ?>" placeholder="Enter user name">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>User Phone</label>
                                    <input type="tel" name="userphone" id="userphone" class="form-control" value="<?php echo isset($_REQUEST['userphone']) ? $_REQUEST['userphone'] : '' ?>" placeholder="Enter user phone">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>User Email</label>
                                    <input type="email" name="useremail" id="useremail" class="form-control" value="<?php echo isset($_REQUEST['useremail']) ? $_REQUEST['useremail'] : '' ?>" placeholder="Enter user email">
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <div>
                                        <button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
                                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> -->
            </div>
            <hr>
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
                        $conexion = new connectionDB();
                        $pdo = $conexion->conectar();
                        if ($pdo != null) {

                            $stmt = "SELECT * FROM  usuarios";
                            foreach ($pdo->query($stmt) as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row['id'];
                                                ?></td>
                                    <td><?php echo $row['nombre'];
                                                ?></td>
                                    <td><?php echo $row['edad'];
                                                ?></td>
                                    <td><?php echo $row['telefono'];
                                                ?></td>
                                    <td><?php echo $row['email'];
                                                ?></td>
                                    <td><?php echo $row['created_at'];
                                                ?></td>
                                    <td><?php echo $row['updated_at'];
                                                ?></td>
                                    <td align="center">
                                        <a href="actualizar.php?editId=<?php echo $row['id']; ?>" class="text-primary" title="Editar"><i class="fa fa-fw fa-edit"></i></a> |
                                        <a href="borrar.php?delId=<?php echo $row['id']; ?>" class="text-danger" title="Borrar" ><i class="fa fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php }
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>¿ Desea eliminar este usuario ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <a href="" class="btn btn-success">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            </div>
</body>

</html>