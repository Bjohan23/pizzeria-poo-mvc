<?php

namespace app\models;

class viewsModel
{
    protected function obtenerVistasModelo($vista)
    {
        $listaBlanca = [
            "inicio", 
            "nuevoUsuario", 
            "listarUsuario", 
            "buscarUsuario", 
            "actualizarUsuario", 
            "usuarioFoto",
            "cerraSesion",
    ];
        // si el valor esta en el array de la lista blanca
        if (in_array($vista, $listaBlanca)) {
            // si el archivo existe en nuestro directorio  debolvemos la vista 
            if (is_file("./app/views/content/" . $vista . "-view.php")) {
                $contenido = "./app/views/content/" . $vista . "-view.php";
            } else {
                $contenido = "404";
            }
        } elseif ($vista == "login" || $vista == "index") { // si el valor es login o index  devolvemos login
            $contenido = "login";
        } else {
            $contenido = "404";
        }
        return $contenido; // 
    }
}
