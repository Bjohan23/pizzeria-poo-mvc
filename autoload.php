<?php
/*
Autoloading es una característica en PHP que permite la carga automática de clases cuando se necesitan, en lugar de tener que incluirlas manualmente en cada archivo.

La función spl_autoload_register() se utiliza para registrar cualquier número de autoloaders, permitiendo la autoloading de clases en PHP. En este caso, se pasa una función anónima como argumento a spl_autoload_register().

Dentro de esta función anónima, se define la lógica de autoloading. La función toma un parámetro $clase, que es el nombre de la clase que se intenta cargar.

Primero, se construye la ruta del archivo que debería contener la definición de la clase. Se asume que el archivo tendrá el mismo nombre que la clase y estará en el mismo directorio que el archivo autoload.php. La ruta del archivo se construye concatenando __DIR__ (una constante mágica que contiene el directorio del archivo actual), una barra de separación / y el nombre de la clase con la extensión .php.

Luego, se utiliza la función str_replace() para reemplazar todason / en la ruta del archivo. Esto se hace para asegurar que la ruta del archivo sea válida en todos los sistemas operativos.

Finalmente, se verifica si el archivo existe y es un archivo regular con la función is_file(). Si el archivo existe, se incluye con require_once(). Esto significa que la definición de la clase se incluirá exactamente una vez. Si se intenta incluir el archivo más de una vez, las inclusiones adicionales serán ignoradas. Esto es útil para prevenir errores de redefinición de clases.
*/


spl_autoload_register(function ($clase) { // spl_autoload_register — Registra cualquier número de autoloaders, permitiendo la autoloading de clases en PHP 
    $archivo = __DIR__ . "/" . $clase . ".php"; // __DIR__ es una constante mágica que contiene el directorio del archivo actual
    $archivo = str_replace("\\", "/", $archivo); // Reemplaza todas las apariciones del string / en el string $archivo
    if (is_file($archivo)) { // is_file — Indica si el nombre del fichero es un fichero normal
        require_once $archivo; // require_once — Incluye y evalúa el archivo especificado
    }
});
