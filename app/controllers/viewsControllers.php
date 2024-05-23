<?php
    namespace App\Controllers;
    use App\Models\viewsModel;
    class viewsControllers extends viewsModel //creanos el controlador (clase con la que se trabaja)
    {
        public function obtenerVistasControlador(string $vista){  //Funcion que recive el nombre de la vista a controlar
            //Creamnos un condicional para controlar si la vista viene con una cadena vacia
            if ($vista != "") { //si es distinto de una cadena vacia
                $respuesta = $this->obtenerVistasModelos($vista); //A la variable respeusta le asignamos lo que heredamos de nuestra clase en App\Models\viewsModel              
            } else { //en caso de ser vacia
                $respuesta = "login";
            }
            return $respuesta;

        }
    }
    