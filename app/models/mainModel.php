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

    //MODELO o FUNCION: que evitara las inyecciones SQL (Funciona como filtro - usaremos funciones preparadas - identificar expreciones regulares)

    public function limpiarCadena($cadena)
    {
        $palabras = [
            "<script>",
            "</script>",
            "<script src",
            "<script type=",
            "SELECT * FROM",
            "DELETE FROM",
            "INSERT INTO",
            "DROP TABLE",            //Cada una de las componenetes de este arreglo, seran las cadenas que no permitiremos en los datos del formulairo
            "DROP DATABASE",
            "TRUNCATE TABLE",
            "SHOW TABLES",
            "SHOW DATABASES",
            "<?php",
            "?>",
            "--",
            "^",
            "<",
            ">",
            "==",
            "=",
            ";",
            "::"
        ];

        $cadena = trim($cadena); //Funcion nativa de php que elimina los espacion en blanco
        $cadena = stripslashes($cadena); //Funcion nativa de php que elimina las barras de un string

        foreach ($palabras as $palabra) {
            $cadena = str_ireplace($palabra, "", $cadena); //Funcion nativa que busca y quita la palabra que recibe como parametro
        }

        $cadena = trim($cadena);             //Se repide estos dos pasos por lo que haya quedado algun espacio en blando o barras invertidos
        $cadena = stripslashes($cadena);

        return $cadena;
    }
}

?>