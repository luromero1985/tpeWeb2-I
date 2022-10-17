<?php

class EmpleadoController extends Controller
{
   public function inicio()
   {
      $this->autentificacionHelper->usoAutenticacion();
      $this->vistaEmpleado->mostrarInicio();
   }

   //genero la tabla que vincula la tabla principal con la secundaria
   public function empleadoConPuesto()
   {
      $this->autentificacionHelper->usoAutenticacion();
      $empleados = $this->modeloEmpleado->empleadoConCategoria();
      $categorias = $this->modeloCategoria->getAllCategorias();

      if (!empty($empleados)) { //si hay empleados
         $this->vistaEmpleado->mostrarTablaEmpleadoConPuesto($empleados, $categorias);
      } else {
         $this->vistaEmpleado->mostrarTablaEmpleadoConPuesto('No hay empleados registrados', $categorias);
      }
   }


   //mostramos el formulario de carga
   function mostrarFormulario()
   {
      $this->autentificacionHelper->chequeoLogueo();
      $empleados = $this->modeloEmpleado->empleadoConCategoria();
      $categorias = $this->modeloCategoria->getAllCategorias();
      $this->vistaEmpleado->formularioCargaEmpleado($empleados, $categorias);
   }

   function agregarEmpleado()
   {
      $this->autentificacionHelper->chequeoLogueo();
      $empleado = $this->modeloEmpleado->empleadoConCategoria();
      $categorias =  $this->modeloCategoria->getAllCategorias();

      //validar la entrada de mis datos
      if (isset($_POST['nombre']) && isset($_POST['dni']) && isset($_POST['celular']) && isset($_POST['mail']) && isset($_POST['id_categoria_fk'])) {
         $nuevoNombre = $_POST['nombre'];
         $nuevoDNI = $_POST['dni'];
         $nuevoCelular = $_POST['celular'];
         $nuevoMail = $_POST['mail'];
         $nuevaCategoria = $_POST['id_categoria_fk'];

         $this->modeloEmpleado->insertEmpleado($nuevoNombre, $nuevoDNI, $nuevoCelular, $nuevoMail, $nuevaCategoria);
         header("Location:" . BASE_URL . 'empleados');
         die();
      } else {
         $this->vistaEmpleado->formularioCargaEmpleado($empleado, $categorias, 'Complete todos los campos');
      }
   }


   //borramos un empleado de la tabla
   function deleteEmpleado($id)
   {
      $this->autentificacionHelper->chequeoLogueo();
      $this->modeloEmpleado->deleteEmpleadoById($id);
      header("Location:" . BASE_URL . 'empleados');
      die();
   }


   //traemos un empleado de la tabla al formulario para editar
   function traerDatosAlFormulario($id)
   {
      $this->autentificacionHelper->chequeoLogueo();
      $empleado = $this->modeloEmpleado->getEmpleadoById($id);
      $categorias = $this->modeloCategoria->getAllCategorias();
      $this->vistaEmpleado->mostrarEmpleadoEdicion($empleado, $categorias);
   }


   //modificamos la bd con la seleccion del empleado
   function empleadoEditado($idAEditar)
   {
      $this->autentificacionHelper->usoAutenticacion();
      $nuevoNombre = $_POST['nombre'];
      $nuevoDNI = $_POST['dni'];
      $nuevoCelular = $_POST['celular'];
      $nuevoMail = $_POST['mail'];
      $nuevaCategoria = $_POST['id_categoria_fk'];

      if (empty($this->modeloEmpleado->idYaIngresado($idAEditar))) {
         $this->modeloEmpleado->editarEmpleado($idAEditar, $nuevoNombre, $nuevoDNI, $nuevoCelular, $nuevoMail, $nuevaCategoria);

         header("Location:" . BASE_URL . "empleados");
         die();
      }
   }


   //hago los filtros

   function filtrarEmpleadoDni()
   {
      $this->autentificacionHelper->usoAutenticacion();
      if (!empty($_POST['dniBuscado'])) {
         $dniBuscado = $_POST['dniBuscado'];
         $empleados = $this->modeloEmpleado->getEmpleadoByDni($dniBuscado);
         $categorias = $this->modeloCategoria->getAllCategorias();
         $this->vistaEmpleado->mostrarTablaEmpleadoConPuesto($empleados, $categorias);
      }
   }


   function filtrarEmpleadoNombre()
   {
      $this->autentificacionHelper->usoAutenticacion();
      if (!empty($_POST['nombreBuscado'])) {
         $nombreBuscado = $_POST['nombreBuscado'];
         $empleados = $this->modeloEmpleado->getEmpleadoPorNombre($nombreBuscado);
         $categorias = $this->modeloCategoria->getAllCategorias();

         $this->vistaEmpleado->mostrarTablaEmpleadoConPuesto($empleados, $categorias);
      }
   }


   function filtrarEmpleadoPuesto()
   {
      $this->autentificacionHelper->usoAutenticacion();
      if (!empty($_POST['puestoBuscado'])) {
         $puestoBuscado = $_POST['puestoBuscado'];
         $empleados = $this->modeloEmpleado->getEmpleadoPorPuesto($puestoBuscado);
         $categorias = $this->modeloCategoria->getAllCategorias();

         $this->vistaEmpleado->mostrarTablaEmpleadoConPuesto($empleados, $categorias);
      }
   }
}
