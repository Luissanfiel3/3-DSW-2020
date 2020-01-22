
<?php

require('IProfesorDAO.php');
require('ICursosDAO.php');
require('DataSource.php');
require('Profesor.php');
require('Cursos.php');

class Pro_CurDAO implements ICursosDAO, IProfesorDAO
{
    public function selectProfesor($page, $filasporpagina)
    {
        $ds = new DataSource();
        $ds->openConnection();
        $profesores = array();

        $offset = $page * $filasporpagina;

        try {
            $dbh = $ds->getDbh();

            $sql = "SELECT id , nombre , edad, telefono, email , created_at , updated_at
            FROM profesores 
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

                $profesor = new Profesor($id, $nombre, $edad, $telefono, $email, $created_at, $updated_at);
                array_push($profesores, $profesor);
            }
        } catch (PDOException $e) {
            echo "erro al mostrar el usuario" . $e->getMessage();
        }
        $ds->closeConnection();
        return $profesores;
    }

    public function selectCursos($page, $filasporpagina)
    {
        $ds = new DataSource();
        $ds->openConnection();
        $cursos = array();

        $offset = $page * $filasporpagina;

        try {
            $dbh = $ds->getDbh();

            $sql = "SELECT id ,nombre,lugar, modalidad ,  profesor_id ,fecha_inicio, plazas
            FROM cursos 
            LIMIT  $offset, $filasporpagina";

            $stmt = $dbh->prepare($sql);

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();


            while ($row = $stmt->fetch()) {
                $id = $row['id'];
                $nombre = $row['nombre'];
                $lugar = $row['lugar'];
                $modalidad = $row['modalidad'];
                $profesor_id = $row["profesor_id"];
                $fecha_inicio = $row["fecha_inicio"];
                $plazas = $row["plazas"];

                $curso = new Cursos($id, $nombre, $lugar, $modalidad, $profesor_id, $fecha_inicio, $plazas);
                array_push($cursos, $curso);
            }
        } catch (PDOException $e) {
            echo "erro al mostrar el curso" . $e->getMessage();
        }
        $ds->closeConnection();
        return $cursos;
    }

    public function countCursos()
    {
        $ds = new DataSource();
        $ds->openConnection();

        try {
            $dbh = $ds->getDbh();
            $sql  = "SELECT COUNT(*) FROM cursos";
            return ($dbh->query($sql)->fetchColumn());
            // $stmt = $dbh->prepare($sql);
            // $stmt->setFetchMode(PDO::FETCH_ASSOC);
            // $stmt->execute();

        } catch (PDOException $e) {
            echo "error al contar filas" . $e->getMessage();
        }
    }

    public function insertCurso($curso)
    {
        $ds = new DataSource();
        $ds->openConnection();

        $dbh = $ds->getDbh();
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $dbh->prepare("INSERT INTO cursos (nombre,lugar,modaliad,profesor_id,fecha_inicio,plazas) values(?, ?, ?, ?, ?,?)");
        $timestamp = date('Y-m-d H:i:S');

        try {
            // $nombre = $valor[0]['nombre'];
            //echo $user['nombre'];
            $stmt->execute(array($curso['nombre'], $curso['lugar'], $curso['modalidad'], $curso['profesor_id'], $timestamp,'fecha_inicio', 'plazas'));
            //echo "Usuario \"" . $user['nombre']. "\" creado.";
            echo "<div class='alert alert-success' role='alert'> 'Usuario \"" . $curso['nombre'] . "\' creado correctamente' </div>";
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger' role='alert'> Error de inserción en la base de datos 'Comprueba los datos introducidos' " . $e->getMessage() . "</div>";
        }
        $ds->closeConnection();
    }


    public function countProfesores()
    {
        $ds = new DataSource();
        $ds->openConnection();

        try {
            $dbh = $ds->getDbh();
            $sql  = "SELECT COUNT(*) FROM profesores";
            return ($dbh->query($sql)->fetchColumn());
            // $stmt = $dbh->prepare($sql);
            // $stmt->setFetchMode(PDO::FETCH_ASSOC);
            // $stmt->execute();

        } catch (PDOException $e) {
            echo "error al contar filas" . $e->getMessage();
        }
    }
}
