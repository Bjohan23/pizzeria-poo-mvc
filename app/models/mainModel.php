<?php

namespace app\models;

// use \PDO; :de la carpeta raiz se incluye la clase PDO pero  
//  tambien se puede usar asi: \PDO

if (file_exists((__DIR__ . "/../../config/server.php"))) { // si existe el archivo server.php se incluye 
    require_once(__DIR__ . "/../../config/app.php");
}

class mainModel
{
    private $DB_server = DB_SERVER;
    private $DB_user = DB_USER;
    private $DB_pass = DB_PASSWORD;
    private $DB_name = BD_NAME;

    protected function conectar() // metodo para conectar a la base de datos 
    {
        try {
            $conexion = new \PDO("mysql:host=" . $this->DB_server . ";dbname=" . $this->DB_name, $this->DB_user, $this->DB_pass);
            $conexion->exec("SET CHARACTER SET utf8"); // se establece el juego de caracteres utf8 para que se pueda mostrar los caracteres especiales
            return $conexion; // se devuelve la conexion
        } catch (\PDOException $e) { // si hay un error se captura y se muestra el mensaje
            echo "Error: " . $e->getMessage();
        }
    }
    protected function ejecutarConsulta($consulta)
    {
        $sql = $this->conectar()->prepare($consulta); // se prepara la consulta 
        $sql->execute(); // se ejecuta la consulta
        return $sql; // se devuelve la consulta
    }
    public function limpiarCadena($cadena)
    {
        $cadena = trim($cadena); // se eliminan los espacios en blanco
        $cadena = stripslashes($cadena); // se eliminan las barras invertidas
        $cadena = str_ireplace("<script>", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("</script>", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("<script src", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("<script type=", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("SELECT * FROM", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("DELETE FROM", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("INSERT INTO", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("--", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("^", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("[", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("]", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("==", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace(";", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("==", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace(">", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("<", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("||", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("&&", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("{", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("}", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("(", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace(")", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("=", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace(",", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("?", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("¿", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("¡", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("!", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("´", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("+", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("-", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("*", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("/", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("¨", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace(":", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace(";", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace(">", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("<", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("´´", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("``", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("''", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("``", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("''", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("´´", "", $cadena); // se eliminan las etiquetas script
        $cadena = str_ireplace("´´", "", $cadena); // se eliminan las etiquetas script
        return $cadena; // se devuelve la cadena
    }
    protected function verificarDatos($filtro, $cadena)
    {
        if (preg_match("/^" . $filtro . "$/", $cadena)) { // si la cadena coincide con el filtro
            return false; // se devuelve false
        } else {
            return true; // se devuelve true
        }
    }

    protected function guardarDatos($tabla, $datos)
    {
        $query = "INSERT INTO $tabla (nombre,apellido,telefono) VALUES (:nombre,:apellido,:telefono)";
        $c = 0;
        foreach ($datos as $clave) {
            if ($c <= 1) {
                $query .= ","; // se agrega una coma si el contador es menor o igual a 1
                $query .= $clave["campo_nombre"];
                $c++;
            }
            $query .= ") VALUES (";
            $C = 0;
            foreach ($datos as $clave) {
                if ($c >= 1) {
                    $query .= ",";
                    $query .= $clave["campo_marcador"];
                    $c++;
                }
                $query .= ")";
                $sql = $this->conectar()->prepare($query);
                foreach ($datos as $clave) {
                    $sql->bindParam($clave["campo_marcador"], $clave["campo_valor"]);
                }
                $sql->execute();
                return $sql;
            }
        }
    }
    public function seleccionarDatos($tipo, $tabla, $campo, $id)
    {
        $tipo = $this->limpiarCadena($tipo);
        $campo = $this->limpiarCadena($campo);
        $id = $this->limpiarCadena($id);
        $tabla = $this->limpiarCadena($tabla);
        // 
        if ($tipo == "unico") {
            $sql = "SELECT * FROM $tabla WHERE $campo = :id";
            $sql = $this->conectar()->prepare($sql);
            $sql->bindParam(":id", $id);
        } elseif ($tipo == "normal") {
            $sql = "SELECT $campo FROM $tabla";
            $sql = $this->conectar()->prepare($sql);
        }
        $sql->execute();
        return $sql->fetchAll();
    }
    /*----------  Funcion para ejecutar una consulta UPDATE preparada  ----------*/
    protected function actualizarDatos($tabla, $datos, $condicion)
    {

        $query = "UPDATE $tabla SET ";

        $C = 0;
        foreach ($datos as $clave) {
            if ($C >= 1) {
                $query .= ",";
            }
            $query .= $clave["campo_nombre"] . "=" . $clave["campo_marcador"];
            $C++;
        }

        $query .= " WHERE " . $condicion["condicion_campo"] . "=" . $condicion["condicion_marcador"];

        $sql = $this->conectar()->prepare($query);

        foreach ($datos as $clave) {
            $sql->bindParam($clave["campo_marcador"], $clave["campo_valor"]);
        }

        $sql->bindParam($condicion["condicion_marcador"], $condicion["condicion_valor"]);

        $sql->execute();

        return $sql;
    }
    /*---------- Funcion eliminar registro ----------*/
    protected function eliminarRegistro($tabla, $campo, $id)
    {
        $sql = $this->conectar()->prepare("DELETE FROM $tabla WHERE $campo=:id");
        $sql->bindParam(":id", $id);
        $sql->execute();

        return $sql;
    }
    /*---------- Paginador de tablas ----------*/
    // protected function paginadorTablas($pagina, $numeroPaginas, $url, $botones)
    // {
    //     $tabla = '<nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">';

    //     if ($pagina <= 1) {
    //         $tabla .= '
    //             <a class="pagination-previous is-disabled" disabled >Anterior</a>
    //             <ul class="pagination-list">
    //             ';
    //     } else {
    //         $tabla .= '
    //             <a class="pagination-previous" href="' . $url . ($pagina - 1) . '/">Anterior</a>
    //             <ul class="pagination-list">
    //                 <li><a class="pagination-link" href="' . $url . '1/">1</a></li>
    //                 <li><span class="pagination-ellipsis">&hellip;</span></li>
    //             ';
    //     }


    //     $ci = 0;
    //     for ($i = $pagina; $i <= $numeroPaginas; $i++) {

    //         if ($ci >= $botones) {
    //             break;
    //         }

    //         if ($pagina == $i) {
    //             $tabla .= '<li><a class="pagination-link is-current" href="' . $url . $i . '/">' . $i . '</a></li>';
    //         } else {
    //             $tabla .= '<li><a class="pagination-link" href="' . $url . $i . '/">' . $i . '</a></li>';
    //         }

    //         $ci++;
    //     }


    //     if ($pagina == $numeroPaginas) {
    //         $tabla .= '
    //             </ul>
    //             <a class="pagination-next is-disabled" disabled >Siguiente</a>
    //             ';
    //     } else {
    //         $tabla .= '
    //                 <li><span class="pagination-ellipsis">&hellip;</span></li>
    //                 <li><a class="pagination-link" href="' . $url . $numeroPaginas . '/">' . $numeroPaginas . '</a></li>
    //             </ul>
    //             <a class="pagination-next" href="' . $url . ($pagina + 1) . '/">Siguiente</a>
    //             ';
    //     }

    //     $tabla .= '</nav>';
    //     return $tabla;
    // }
    /*---------- Paginador de tablas ----------*/
    protected function paginadorTablas($pagina, $numeroPaginas, $url, $botones)
    {
        $tabla = '<nav aria-label="Table navigation"><ul class="inline-flex items-center">';

        // Botón "Anterior"
        if ($pagina <= 1) {
            $tabla .= '<li><button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous" disabled>
                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button></li>';
        } else {
            $tabla .= '<li><button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous" onclick="window.location=\'' . $url . ($pagina - 1) . '/\'">
                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button></li>';
        }

        // Números de página
        $ci = 0;
        for ($i = $pagina; $i <= $numeroPaginas; $i++) {
            if ($ci >= $botones) {
                break;
            }

            if ($pagina == $i) {
                $tabla .= '<li><button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple" aria-current="page">' . $i . '</button></li>';
            } else {
                $tabla .= '<li><button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple" onclick="window.location=\'' . $url . $i . '/\'">' . $i . '</button></li>';
            }

            $ci++;
        }

        // Botón "Siguiente"
        if ($pagina == $numeroPaginas) {
            $tabla .= '<li><button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next" disabled>
                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button></li>';
        } else {
            $tabla .= '<li><button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next" onclick="window.location=\'' . $url . ($pagina + 1) . '/\'">
                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button></li>';
        }

        $tabla .= '</ul></nav>';
        return $tabla;
    }
}
