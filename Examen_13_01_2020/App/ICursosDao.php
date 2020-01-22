<?php

interface ICursosDAO
{
    public function selectCursos($page, $filasporpagina);
    //public function selectUsersPages($page, $filasporpagina);
    public function countCursos();
   // public function selectUsersById($id);
    public function insertCurso($curso);
   //public function updateUser($user);
   // public function deleteUser($id);
}
