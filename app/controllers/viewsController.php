<?php


namespace app\controllers;

use app\models\viewsModel;

class viewsController  extends viewsModel
{ // incluimos 
    public function obtenerVistasControlador($vista)
    {
        if ($vista != " ") { // si  es distinto a un texto bacio
            $respuests = $this->obtenerVistasModelo($vista); // llamamos al metodo de la clase viewsModel
        } else {
            $respuests = "login"; // si no devolvemos login
        }
        return $respuests; // devolvemos la respuesta
    }
}
