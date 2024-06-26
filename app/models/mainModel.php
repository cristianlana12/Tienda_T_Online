<?php
namespace App\Models;

use \PDO;

if (file_exists(__DIR__ . "/../../config/server.php")) {
    require_once (__DIR__ . "/../../config/server.php");
}

//MODELO PRINCIPAL 
class mainModel
{
    private $server = DB_SERVER;
    private $db = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;

    protected function conectar()
    {
        $conexion = new PDO("mysql:host=" . $this->server . ";dbname=" . $this->db, $this->user, $this->pass);
        $conexion->exec("SET CHARACTER SET utf8");
        return $conexion;
    }

    //MODELO o FUNCION: Que nos permite ejecutar consultas
    protected function ejecutarConsulta($consulta)
    { //funcion que recibe un parametro, que sera la consulta a ejecutar
        $sql = $this->conectar()->prepare($consulta); //accedo a la funcion conectar de la clase y llamo al metodo prepare() para preparar una consulta
        $sql->execute(); //Con esto ejecutamos la consulta
        return $sql;
    }
}

?>