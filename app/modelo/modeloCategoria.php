<?php
class ModeloCategoria
{
    private $db;

    public function __construct()
    {

        $this->db = new PDO('mysql:host=localhost;' . 'dbname=dbproyecto; charset=utf8', 'root', '');
    }

    public function getAllCategorias()
    {
        //la base de datos ya está abierta por el constructor de la clase
        //ejecutamos la sentencia

        $query = $this->db->prepare('SELECT*FROM categoria');
        $query->execute();

        //obtengo los resultados

        return  $query->fetchAll(PDO::FETCH_OBJ); //ARREGLO DE OBJETOS

    }

    //insertamos una categoria en la base de datos
    public function insertCategoria($nombre, $descripcion, $sueldo)
    {
        $query = $this->db->prepare('INSERT INTO categoria (puesto, descripcion, sueldo) VALUES (?,?,?)');
        $query->execute([$nombre, $descripcion, $sueldo]);
        return $this->db->lastInsertId(); //devuelve una cadena que representa el ID de fila de la última fila que se insertó en la base de datos.

    }



    //eliminamos una categoria dado su id

    function deleteCategoriaById($id)
    {
        $query = $this->db->prepare('DELETE FROM categoria WHERE id=?');
        $query->execute([$id]);
    }


    //editamos una categoria

    //1-busco la categoria por su id
    function getCategoriaById($id)
    {
        $query = $this->db->prepare('SELECT* FROM categoria WHERE id=?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    //2- una vez seleccionada la categoria indicamos que vamos a modificar
   public function idYaIngresado($id)
    {
        $query = $this->db->prepare('SELECT id FROM categoria WHERE puesto LIKE ?');
        $query->execute([$id]);
    }

    //3-  modificamos los campos de la categoria seleccionada
    public function editarCategoria($puestoAEditar, $puesto, $descripcion, $sueldo)
    {
        $query = $this->db->prepare('UPDATE categoria SET `puesto`=?, `descripcion`=? ,`sueldo`=? WHERE `id` = ?');
        try {
            $query->execute([$puesto, $descripcion, $sueldo, $puestoAEditar]);
        } catch (PDOException $e) {
            var_dump($e);
        }
    }



    // traigo una categoria de la tabla por nombre 
    public function getPuesto($puesto)
    {
        //la base de datos ya está abierta por el constructor de la clase
        //ejecutamos la sentencia

        $query = $this->db->prepare('SELECT*FROM  categoria WHERE puesto LIKE ?');
        $query->execute(["%${puesto}%"]);
        $puestos = $query->fetchAll(PDO::FETCH_OBJ);
        return $puestos;
    }

    // traigo una categoria de la tabla por sueldo 
    public function getSueldo($sueldo)
    {
        //la base de datos ya está abierta por el constructor de la clase
        //ejecutamos la sentencia

        $query = $this->db->prepare('SELECT*FROM  categoria WHERE sueldo LIKE ?');
        $query->execute(["%${sueldo}%"]);
        $sueldos = $query->fetchAll(PDO::FETCH_OBJ);
        return $sueldos;
    }
}
