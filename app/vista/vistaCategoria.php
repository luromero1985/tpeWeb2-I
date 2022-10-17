<?php
require_once './libreria/smarty-4.2.1/libs/Smarty.class.php';

class vistaCategoria
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();  //inicializo smarty

    }


    function mostrarCategorias($categorias, $errorBorrar = NULL)
    {
        //asigno valores al tpl smarty
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('errorBorrar', $errorBorrar);
        //mostramos el tpl
        $this->smarty->display('templates/listaPuestos.tpl');
    }

    function mostrarCategoriaEdicion($categoria)
    {
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->display('templates/formularioEdicionCategoria.tpl');
    }
}
