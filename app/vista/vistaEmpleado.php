<?php
require_once './libreria/smarty-4.2.1/libs/Smarty.class.php';

class vistaEmpleado
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();  //inicializo smarty

    }

    function mostrarInicio()
    {
        $this->smarty->display('templates/home.tpl');
    }



    //muestro en la tabla de empleados el puiesto en el que pertenece cada uno
    function mostrarTablaEmpleadoConPuesto($empleados, $categorias)
    {
        //asigno valores al tpl smarty
        $this->smarty->assign('empleados', $empleados);
        $this->smarty->assign('categorias', $categorias);
        //mostramos el tpl
        $this->smarty->display('templates/listaEmpleados.tpl');
    }

    function mostrarEmpleadoEdicion($empleado, $categorias)
    {
        $this->smarty->assign('empleado', $empleado);
        $this->smarty->assign('categorias', $categorias);

        $this->smarty->display('templates/formularioEdicionEmpleado.tpl');
    }



    function formularioCargaEmpleado($empleado, $categorias, $completar = NULL)
    {
        $this->smarty->assign('empleado', $empleado);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('completar', $completar);

        //mostramos el tpl
        $this->smarty->display('templates/formularioCargarEmpleado.tpl');
    }
}
