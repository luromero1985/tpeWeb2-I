<?php

require_once './app/modelo/modeloEmpleado.php';
require_once './app/vista/vistaEmpleado.php';
require_once './app/modelo/modeloCategoria.php';
require_once './app/vista/vistaCategoria.php';
require_once './app/vista/vistaAutenticacion.php';
require_once './app/modelo/modeloUsuario.php';
require_once './app/helpers/autentificacion.helper.php';



class  Controller
{

    protected $modeloEmpleado;
    protected $vistaEmpleado;
    protected $modeloCategoria;
    protected $vistaCategoria;
    protected $vistaAutenticacion;
    protected $modeloUsuario;
    protected $autentificacionHelper;


    public function __construct()
    {
        $this->modeloCategoria = new ModeloCategoria();
        $this->vistaCategoria = new VistaCategoria();
        $this->modeloEmpleado = new ModeloEmpleado();
        $this->vistaEmpleado = new VistaEmpleado();
        $this->vistaAutenticacion = new VistaAutenticacion();
        $this->modeloUsuario = new ModeloUsuario();
        $this->autentificacionHelper = new AutentificacionHelper();
    }
}
