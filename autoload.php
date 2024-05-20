<?php
    spl_autoload_register(function ($class_name) {
        $archivo = __DIR__; //en la variable archivo guardamos la ruta del archivo de la clase, donde asigmamos el valor de la constante __DIR__ esta constante optiene el directorio actual que se esta ejecutando
        
    });