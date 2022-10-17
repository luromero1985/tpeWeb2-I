<?php
require_once './libreria/smarty-4.2.1/libs/Smarty.class.php';

class VistaAutenticacion
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();  //inicializo smarty

    }

    function formularioLogin($error = NULL)
    {  //parametrizamos error, al poner NULL digo que si llega lo uso, sino no pasa nada
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/login.tpl');
    }

    function estaLogueado($logueado = NULL)
    {  //parametrizamos error, al poner NULL digo que si llega lo uso, sino no pasa nada
        $this->smarty->assign('logueado', $logueado);
        $this->smarty->display('templates/header.tpl');
    }
}
