<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model {
    protected $table = 'Autores';
    protected $primaryKey = 'id';
    public $timestamps = false;
}