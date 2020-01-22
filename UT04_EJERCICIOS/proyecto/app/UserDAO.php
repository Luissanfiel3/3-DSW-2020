<?php

require('IUserDAO.php');
require('DataSource.php');
require('User.php');

class UserDAO implements IUserDAO
{
    /**
     * Devolver todos los usuarios de la base de datos
     */

    /*public function selectUsers()
    {
        $ds = new DataSource();
        $ds->openConnection();
        $users = array();

        try {
            $dbh = $ds->getDbh();


            $stmt = $dbh->prepare("SELECT id , nombre , edad, telefono , email , created_at , updated_at FROM usuarios 
            LIMIT 10");

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();


            while ($row = $stmt->fetch()) {
                $id = $row['id'];
                $nombre = $row['nombre'];
                $edad = $row['edad'];
                $telefono = $row['telefono'];
                $email = $row["email"];
                $created_at = $row["created_at"];
                $updated_at = $row["updated_at"];

                $user = new User($id, $nombre, $edad, $telefono, $email, $created_at, $updated_at);
                array_push($users, $user);
            }
        } catch (PDOException $e) {
            echo "erro al mostrar el usuario" . $e->getMessage();
        }
        $ds->closeConnection();
        return $users;
    }*/

    public function selectUsers($page, $filasporpagina)
    {
        $ds = new DataSource();
        $ds->openConnection();
        $users = array();

        $offset = $page * $filasporpagina;

        try {
            $dbh = $ds->getDbh();

            $sql = "SELECT id , nombre , edad, telefono , email , created_at , updated_at 
            FROM usuarios 
            LIMIT  $offset, $filasporpagina";

            $stmt = $dbh->prepare($sql);

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();


            while ($row = $stmt->fetch()) {
                $id = $row['id'];
                $nombre = $row['nombre'];
                $edad = $row['edad'];
                $telefono = $row['telefono'];
                $email = $row["email"];
                $created_at = $row["created_at"];
                $updated_at = $row["updated_at"];

                $user = new User($id, $nombre, $edad, $telefono, $email, $created_at, $updated_at);
                array_push($users, $user);
            }
        } catch (PDOException $e) {
            echo "erro al mostrar el usuario" . $e->getMessage();
        }
        $ds->closeConnection();
        return $users;
    }


    public function countUsers()
    {
        $ds = new DataSource();
        $ds->openConnection();

        try {
            $dbh = $ds->getDbh();
            $sql  = "SELECT COUNT(*) FROM usuarios";
            return ($dbh->query($sql)->fetchColumn());
            // $stmt = $dbh->prepare($sql);
            // $stmt->setFetchMode(PDO::FETCH_ASSOC);
            // $stmt->execute();

        } catch (PDOException $e) {
            echo "erro al contar filas" . $e->getMessage();
        }
    }

    /**
     * Devolver Usuario filltrado por ID
     */
    public function selectUsersById($id)
    {
        $ds = new DataSource();
        $stmt = $ds->openConnection();

        $dbh = $ds->getDbh();
        $stmt = $dbh->prepare("SELECT id , nombre , edad, telefono , email , created_at , updated_at FROM usuarios WHERE id =:id");
        $stmt->bindParam(':id', $id);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        try {
            while ($row = $stmt->fetch()) {
                $id = $row['id'];
                $nombre = $row['nombre'];
                $edad = $row['edad'];
                $telefono = $row['telefono'];
                $email = $row["email"];
                $created_at = $row["created_at"];
                $updated_at = $row["updated_at"];
                // $user = array("nombre" => $nombre, "edad" => $edad, "telefono" => $telefono, "email" => $email);
                $user = new User($id, $nombre, $edad, $telefono, $email, $created_at, $updated_at);
                break;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $user;
    }

    /**
     * Método  que inserta el usuario en la base de datos
     */
    public function insertUser($user)
    {
        $ds = new DataSource();
        $ds->openConnection();

        $dbh = $ds->getDbh();
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $dbh->prepare("INSERT INTO usuarios (nombre,edad,telefono,email,created_at) values(?, ?, ?, ?, ?)");
        $timestamp = date('Y-m-d H:i:S');

        try {
            // $nombre = $valor[0]['nombre'];
            //echo $user['nombre'];
            $stmt->execute(array($user['nombre'], $user['edad'], $user['telefono'], $user['email'], $timestamp));
            //echo "Usuario \"" . $user['nombre']. "\" creado.";
            echo "<div class='alert alert-success' role='alert'> 'Usuario \"" . $user['nombre'] . "\' creado correctamente' </div>";
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger' role='alert'> Error de inserción en la base de datos 'Comprueba los datos introducidos' " . $e->getMessage() . "</div>";
        }
        $ds->closeConnection();
    }

    /**
     * Método que atualiza los datos del Usuario
     */

    public function updateUser($user)
    {

        $timestamp = date('Y-m-d H:i:S');
        $ds = new DataSource();
        $ds->openConnection();

        $dbh = $ds->getDbh();
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Indicamos que vaya a la excepcion
        //$timestamp = date('Y-m-d H:i:s');

        $sql = "UPDATE usuarios"
            . " SET nombre =:nombre, edad = :edad , telefono = :telefono , email = :email , updated_at = :updated_at"
            . " WHERE id =:id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $user['id']);
        $stmt->bindParam(':nombre', $user['nombre']);
        $stmt->bindParam(':edad', $user['edad']);
        $stmt->bindParam(':telefono', $user['telefono']);
        $stmt->bindParam(':email', $user['email']);
        $stmt->bindParam(':updated_at', $timestamp);
        try {
            $stmt->execute();
            echo "El usuario:  " . $user['nombre'] . " con ID: " . $user['id'] . " ha sido modificado correctmanete ";
        } catch (Exception $e) {
            echo "Error de inserción de Usuarios: " . $e->getMessage();
        }
    }

    /**
     * Método que borra un usuario de la base de datos
     */
    public function deleteUser($id)
    {
        $ds = new DataSource();
        $ds->openConnection();

        $dbh = $ds->getDbh();

        $sql = "DELETE  FROM usuarios WHERE id=$id";
        $stmt = $dbh->prepare($sql);
        try {
            $stmt->execute(array($id));
            echo "<div class='alert alert-success' role='alert'>User successfully deleted</div>";
        } catch (Exception $e) {
            header('NO se puede eliminar el usuario ' . $e->getMessage());
        }

        $ds->closeConnection();
    }
}
