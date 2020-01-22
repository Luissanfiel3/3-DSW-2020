<?php
require('app/UserDAO.php');

if (!empty($_GET['delId'])) {
    $id = $_GET['delId'];
    $user = new UserDAO();
    $user->deleteUser($id);
    //$user->selectUsers();
    header("Location:listar.php");
}
else {
    echo "El campo ID está vacío";
}


