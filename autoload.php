<?php
    spl_autoload_register(function ($class_name) {
        //OBTENEMOS TODA LA RUTA DEL ARCHIVO QUE USAREMOS
        $archivo = __DIR__ . "/" . $class_name . ".php"; //en la variable archivo guardamos la ruta del archivo de la clase, donde asigmamos el valor de la constante __DIR__ esta constante optiene el directorio actual que se esta ejecutando
        $archivo = str_replace("\\", "/", $archivo);

        if (is_file($archivo)) {
            require_once($archivo);
        }
    });