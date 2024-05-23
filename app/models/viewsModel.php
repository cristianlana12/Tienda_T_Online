<?php
namespace App\Models; //espacio de trabajo

//cuando usamos MVC los modelos y controladores trabajan en conjunto 
//Entonces debemos crear un controlador para este respectivo modelo

class viewsModel
{
    //Creamos el metodo de tipo protected donde es una function 
    protected function obtenerVistasModelos(string $vista) //funcion que recibe el nombre de la vista, donde pregunta si existe en las posibles vistas el array
    {
        $listaBlanca = ["dashboard"];  //Estos valores estaran en los valores de la url
        if (in_array($vista, $listaBlanca)) {
            //en caso de que exista la vista en el arreglo
            if (is_file("./app/views/content/" . $vista . "-view.php")) {
                //En caso de que exista el archivo en la direccion de la vista
                $contenido = "./app/views/content/" . $vista . "-view.php";
                //se asigna a contendio toda la ruta
            } else {
                //En caso de que noe xista el archivo de la vista, se asigna a contenido "404"
                $contenido = "404";
            }
        }else {//En caso de que no exista la vista en el arreglo
            if ($vista == "login" || $vista == "index") { //Pregunta si la vista es el login o el index
                $contenido = "login"; //en caso de que sea verdadero a contenido le asignamos login
            }else{
                $contenido = "404"; //en caso contrario asignamos a contenido 404;
            }
        }
        return $contenido; //retornamos contenido
    }
}

