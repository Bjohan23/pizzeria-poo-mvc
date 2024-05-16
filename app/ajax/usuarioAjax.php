<?php
require_once "../../config/app.php";
require_once "../views/inc/session_start.php";
require_once "../../autoload.php"; // importamos el archivo autoload.php para poder hacer uso de las clases sin necesidad de importarlas una por una


use app\controllers\userController;

if (isset($_POST["modulo_usuario"])) {// cuando si se envia un formulario de ese modulo
    $instanciaUsuario = new userController(); // creamos una instancia de la clase userController
    if($_POST["modulo_usuario"] == "registrar"){ // si el modulo es igual a registrar  activamos el controlador
        echo $instanciaUsuario->registrarUsuarioControlador(); // llamamos al metodo registrarUsuarioController  
    } elseif ($_POST["modulo_usuario"] == "actualizar") { // si el modulo es igual a actualizar
    
    }
} else {
    session_destroy();
    header("Location: " . APP_URL . "login/");
}
