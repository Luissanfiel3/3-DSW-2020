<?php
class DataSource
{

   public $host;
   public $db;
   public $user;
   public $password;
   // private $charset;
   private $dbh;

   public function __construct()
   {
      $this->host = 'localhost';
      $this->db = 'usuarios_db';
      $this->user = 'usuarios_user';
      $this->password = 'usuarios_password';
      //$this->charset = constant('CHARSET');
   }

   public function getDbh()
   {
      return $this->dbh;
   }

   public function openConnection()
   {

      try {
         $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db;
         $this->dbh = new PDO($dsn, $this->user, $this->password);
         //$stmt = "SELECT * FROM  usuarios";
         $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         // return $pdo;
      } catch (PDOException $e) {
         echo "Connection Failed" . $e->getMessage();
         //return null;
      }
   }

   /**
    * Método que cierra la conexión sobre la base de datos
    */
   public function closeConnection()
   {
      $this->dbh = null;
   }
}
