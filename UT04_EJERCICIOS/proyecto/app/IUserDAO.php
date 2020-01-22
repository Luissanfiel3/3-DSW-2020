<?php

/**
 * Data Acces Object UserDAO  Con los métodos que deben implementar
 */
interface IUserDAO {
    public function selectUsers($page, $filasporpagina);
    //public function selectUsersPages($page, $filasporpagina);
    public function countUsers();
    public function selectUsersById($id);
    public function insertUser($user);
    public function updateUser($user);
    public function deleteUser($id);
}