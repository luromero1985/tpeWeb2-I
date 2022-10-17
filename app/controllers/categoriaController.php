<?php


class CategoriaController extends Controller
{
   public function mostrarCategoria()
   {
      $this->autentificacionHelper->usoAutenticacion();
      $categorias = $this->modeloCategoria->getAllCategorias();
      if (!empty($categorias))  //si hay categorias
         $this->vistaCategoria->mostrarCategorias($categorias);
      else
         $this->vistaCategoria->mostrarCategorias($categorias, 'No hay categorias registradas');
   }




   function agregarPuesto()
   {
      $this->autentificacionHelper->chequeoLogueo();
      //validar la entrada de mis datos
      $this->modeloCategoria->getAllCategorias();
      $nuevoNombre = $_POST['puesto'];
      $nuevaDescripcion = $_POST['descripcion'];
      $nuevoSueldo = $_POST['sueldo'];
      $this->modeloCategoria->insertCategoria($nuevoNombre, $nuevaDescripcion, $nuevoSueldo);
      header("Location:" . BASE_URL . "puestos");
      die();
   }

   function deleteCategoria($id)
   {
      $this->autentificacionHelper->chequeoLogueo();

      $this->modeloCategoria->deleteCategoriaById($id);

      header("Location:" . BASE_URL . "puestos");
      die();
   }


   //traemos una categoria de la tabla
   function traerDatosAlFormulario($id)
   {
      $this->autentificacionHelper->chequeoLogueo();
      $categoria = $this->modeloCategoria->getCategoriaById($id);
      $this->vistaCategoria->mostrarCategoriaEdicion($categoria);
   }



   //modificamos la bd con la seleccion de la categoria
   function categoriaEditada($idAEditar)
   {
      $this->autentificacionHelper->usoAutenticacion();
      $nuevoPuesto = $_POST['puesto'];
      $nuevaDescripcion = $_POST['descripcion'];
      $nuevoSueldo = $_POST['sueldo'];

      if (empty($this->modeloCategoria->idYaIngresado($idAEditar))) {
         $this->modeloCategoria->editarCategoria($idAEditar, $nuevoPuesto, $nuevaDescripcion, $nuevoSueldo);

         //EN LA VISTA AGREGAR UN ERROR QUE EXPLIQUE, DESDE RUTER MANDO UN CASE QUE SEA ERROR Y QUE ME MUESTRE EL ERROR POR PANTALLA, DESDE LA URL YA LO ESTOY MANDANDO

         header("Location:" . BASE_URL . "puestos");
         die();
      }
   }

   function filtrarPuesto()
   {
      $this->autentificacionHelper->usoAutenticacion();
      if (!empty($_POST['puestoBuscado'])) {
         $puestoBuscado = $_POST['puestoBuscado'];
         $busqueda = $this->modeloCategoria->getPuesto($puestoBuscado);

         $this->vistaCategoria->mostrarCategorias($busqueda);
      }
   }


   function filtrarSueldo()
   {
      $this->autentificacionHelper->usoAutenticacion();
      if (!empty($_POST['sueldoBuscado'])) {
         $sueldopBuscado = $_POST['sueldoBuscado'];
         $busqueda = $this->modeloCategoria->getSueldo($sueldopBuscado);

         $this->vistaCategoria->mostrarCategorias($busqueda);
      }
   }
}
