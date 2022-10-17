<?php
require_once "./app/controllers/controller.php";
require_once "./app/controllers/empleadoController.php";
require_once "./app/controllers/categoriaController.php";
require_once "./app/controllers/autenticacionController.php";

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
define('LOGIN', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/login');

// lee la acción

if (!empty($_GET['action'])) { //con isset no entra el valor de los nav, esto sucede porque no está inicializada antes la variable
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían--> despues enviar al login
}

$params = explode('/', $action); //me convierte en arreglo "parsea"
//var_dump($params); //Lo usé para ver qué traia el arreglo


// instancio el empleado_controller
$autenticacionController = new AutenticacionController();
$controller = new Controller();


// tabla de ruteo, determina que camino seguir según la acción 
switch ($params[0]) {

    case 'home':
        // instancio controller
        $empleadoController = new EmpleadoController();
        $empleadoController->inicio();
        break;
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $autenticacionController->verificacionUsuario();
        } else {
            $autenticacionController->mostrarFormularioLoguin();
        }
        break;
    case 'logout':
        $autenticacionController->logout();
        break;
        //traigo la lista de todos los empleados
    case 'empleados':
        // instancio controller
        $empleadoController = new EmpleadoController();
        $empleadoController->empleadoConPuesto();
        break;
        //traigo la lista de todos los puestos de trabajo
    case 'puestos':
        // instancio controller
        $categoriaController = new CategoriaController();
        $categoriaController->mostrarCategoria();
        break;
        //formulario de carga de empleados
    case 'mostrarFormularioEmpleado':
        // instancio controller
        $empleadoController = new EmpleadoController();
        $empleadoController->mostrarFormulario();
        break;

    case 'agregarEmpleado':
        // instancio el empleado_controller
        $empleadoController = new EmpleadoController();
        $empleadoController->agregarEmpleado();
        break;
        //formulario de carga de puestos
    case 'agregarPuesto':
        $categoriaController = new CategoriaController();
        $categoriaController->agregarPuesto();
        break;

        //borrar fila de la tabla
    case 'deleteEmpleado':
        // instancio el empleado_controller
        $empleadoController = new EmpleadoController();
        $id = $params[1];
        $empleadoController->deleteEmpleado($id);
        break;
    case 'deletePuesto':
        // instancio el empleado_controller
        $categoriaController = new CategoriaController();
        $id = $params[1];
        $errorBorrar = NULL;
        $categoriaController->deleteCategoria($id);
        break;
        //editar fila de la tabla
    case 'editarEmpleado':
        // instancio el empleado_controller
        $empleadoController = new EmpleadoController();
        $id = $params[1];
        $empleadoController->traerDatosAlFormulario($id);
        break;
    case 'empleadoEditado':
        // instancio el empleado_controller
        $empleadoController = new EmpleadoController();
        $id = $params[1];
        $empleadoController->empleadoEditado($id);

        break;
    case 'editarCategoria':
        // instancio el empleado_controller
        $categoriaController = new CategoriaController();
        $id = $params[1];
        $categoriaController->traerDatosAlFormulario($id);
        break;

    case 'editadoCategoria':
        // instancio el empleado_controller
        $categoriaController = new CategoriaController();
        $id = $params[1];
        $categoriaController->categoriaEditada($id);
        break;

        //cargo los datos en la bd de la busqueda del input
    case 'mostrarbusquedaporDNI':
        // instancio el empleado_controller
        $empleadoController = new EmpleadoController();
        $empleadoController->filtrarEmpleadoDni();
        break;
    case 'mostrarbusquedaporNombre':
        // instancio el empleado_controller
        $empleadoController = new EmpleadoController();
        $empleadoController->filtrarEmpleadoNombre();
        break;
    case 'mostrarbusquedaporPuesto':
        // instancio el empleado_controller
        $empleadoController = new EmpleadoController();
        $empleadoController->filtrarEmpleadoPuesto();
        break;
    case 'mostrarbusquedaporCategoriaPuesto':
        // instancio el empleado_controller
        $categoriaController = new CategoriaController();
        $categoriaController->filtrarPuesto();
        break;
    case 'mostrarbusquedaporSueldo':
        // instancio el empleado_controller
        $categoriaController = new CategoriaController();
        $categoriaController->filtrarSueldo();
        break;


    default:
        echo ('404 Page not found');
        break;
}
