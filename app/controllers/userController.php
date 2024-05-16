<?php

namespace app\controllers; // declaramos el espacio de nombre en el que se encuentra el archivo

use app\models\mainModel; // importamos el modelo mainModel para poder hacer uso de sus metodos


class userController extends mainModel // declaramos la clase userController que hereda de mainModel
{
    // controlador para registrar un usuario
    public function registrarUsuarioControlador()
    {
        // almacenamos en una variable los datos que se envian por el formulario

        $nombre  = $this->limpiarCadena($_POST["nombre"]);
        $apellido = $this->limpiarCadena($_POST["apellido"]);
        $email = $this->limpiarCadena($_POST["email"]);
        $usuario = $this->limpiarCadena($_POST["usuario"]);
        $clave = $this->limpiarCadena($_POST["clave"]);
        // verificamos los campos obligatorios
        if ($nombre == "" || $apellido == "" || $email == "" || $usuario == "" || $clave == "") {
            $alerta = [
                "tipo" => "simple",
                "titulo" => "Ocurrió un error inesperado",
                "texto" => "No has llenado todos los campos que son obligatorios",
                "icono" => "error"
            ];
            return json_encode($alerta);
            exit();
        }
    }
}
