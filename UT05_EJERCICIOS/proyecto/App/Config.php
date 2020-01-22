<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection(array(
 'driver' => 'mysql',
 'host' => 'localhost',
 'database' => 'prueba_eloquent',
 'username' => 'root',
 'password' => '',
 'charset' => 'utf8',
 'collation' => 'utf8_unicode_ci'
 
));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher());
$capsule->bootEloquent();

?>