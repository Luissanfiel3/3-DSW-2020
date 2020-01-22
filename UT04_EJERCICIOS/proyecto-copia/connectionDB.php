
<?php
class connectionDB
{

   public $host;
   public $db;
   public $user;
   public $password;
   // private $charset;

   public function __construct()
   {
      $this->host = 'localhost';
      $this->db = 'usuarios_db';
      $this->user = 'usuarios_user';
      $this->password = 'usuarios_password';
      //$this->charset = constant('CHARSET');
   }

   public function conectar()
   {
      $conexion = "mysql:host=" . $this->host . ";dbname=" . $this->db;
      //$dsn = "mysql:hots=localhost;dbname=usuarios_db";

      $opciones = [
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_EMULATE_PREPARES => false,
      ];


      try {

         $pdo = new PDO($conexion, $this->user, $this->password);
        // $stmt = "SELECT * FROM  usuarios";
      
         return $pdo;
      } catch (PDOException $e) {
         echo "Connection Failed" . $e->getMessage();
         return null;
      }   
     
   }
}
