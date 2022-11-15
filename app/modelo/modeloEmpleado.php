<?php

class ModeloEmpleado
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=dbproyecto; charset=utf8', 'root', '');
    }


    //traemos la tabla completa de empleados

    public function getAllEmpleados()
    {
        //la base de datos ya está abierta por el constructor de la clase
        //ejecutamos la sentencia
        $query = $this->db->prepare('SELECT*FROM empleado');
        try {
            $query->execute();
            //obtengo los resultados
            $empleados = $query->fetchAll(PDO::FETCH_OBJ); //ARREGLO DE OBJETOS
            return $empleados;
        } catch (PDOException $e) {
            var_dump($e);
        }
    }

    //vinculo las dos tablas
    public function getAll()   //era empleadosConCategoria
    {
        $query = $this->db->prepare("SELECT empleado.id, empleado.nombre, empleado.dni, empleado.celular, empleado.mail, categoria.puesto as puesto 
                                    FROM empleado 
                                    JOIN categoria ON empleado.id_categoria_fk = categoria.id
                                    ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


    //insertamos un empleado en la base de datos
    public function insertEmpleado($nombre, $dni, $celular, $mail, $id_categoria_fk)
    {
        $query = $this->db->prepare('INSERT INTO empleado (nombre, dni, celular, mail, id_categoria_fk) VALUES (?,?,?,?,?)');
        try {
            $query->execute([$nombre, $dni, $celular, $mail, $id_categoria_fk]);
            return $this->db->lastInsertId(); //devuelve una cadena que representa el ID de fila de la última fila que se insertó en la base de datos.
        } catch (PDOException $e) {
            var_dump($e);
        }
    }

    //eliminamos un empleado dado su id
    function deleteEmpleado($id)
    {
        $query = $this->db->prepare('DELETE FROM empleado WHERE id=?');
        try {
            $query->execute([$id]);
        } catch (PDOException $e) {
            var_dump($e);
        }
    }


    //editamos un empleado

    //1-busco al empleado por su id
    function getEmpleado($id)
    {
        $query = $this->db->prepare('SELECT* FROM empleado WHERE id=?');
        try {
            $query->execute([$id]);
            return  $query->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            var_dump($e);
        }
    }

    //2- una vez seleccionado el empleado indicamos que vamos a modificar
    public function idYaIngresado($id)
    {
        $query = $this->db->prepare('SELECT id FROM empleado WHERE nombre LIKE ?');
        $query->execute([$id]);
    }

    //3-  modificamos los campos del empleado seleccionado
    public function editarEmpleado($nombreAEditar, $nombre, $dni, $celular, $mail, $id_categoria_fk)
    {
        $query = $this->db->prepare('UPDATE empleado SET `nombre`=?, `dni`=? ,`celular`=? ,`mail`=? ,`id_categoria_fk`=? WHERE `id` = ?');

        try {
            $query->execute([$nombre, $dni, $celular, $mail, $id_categoria_fk, $nombreAEditar]);
        } catch (PDOException $e) {
            var_dump($e);
        }
    }



    // traigo un empleado de la tabla por dni
    public function getEmpleadoByDni($dniBuscado)
    {
        //la base de datos ya está abierta por el constructor de la clase
        //ejecutamos la sentencia
        $query = $this->db->prepare("SELECT empleado.id, empleado.nombre, empleado.dni, empleado.celular, empleado.mail, categoria.puesto as puesto FROM empleado JOIN categoria ON empleado.id_categoria_fk = categoria.id WHERE dni LIKE ?");

        $query->execute(["%${dniBuscado}%"]);
        $resultado = $query->fetchAll(PDO::FETCH_OBJ);

        return $resultado;
    }


    // traigo un empleado de la tabla por nombre
    public function getEmpleadoByNombre($nombreBuscado)
    {
        //la base de datos ya está abierta por el constructor de la clase
        //ejecutamos la sentencia
        $query = $this->db->prepare("SELECT empleado.id, empleado.nombre, empleado.dni, empleado.celular, empleado.mail, categoria.puesto as puesto FROM empleado JOIN categoria ON empleado.id_categoria_fk = categoria.id WHERE nombre LIKE ?");

        $query->execute(["%${nombreBuscado}%"]);
        $resultado = $query->fetchAll(PDO::FETCH_OBJ); //me devuelve un arreglo de objetos, fetch me devuelve solo un arreglo

        return $resultado;
    }


    // traigo un empleado de la tabla por categoria 
    public function getEmpleadoByPuesto($puestobuscado)
    {
        //la base de datos ya está abierta por el constructor de la clase
        //ejecutamos la sentencia

        $query = $this->db->prepare("SELECT empleado.id, empleado.nombre, empleado.dni, empleado.celular, empleado.mail, categoria.puesto as puesto FROM empleado JOIN categoria ON empleado.id_categoria_fk = categoria.id WHERE puesto LIKE ?");

        $query->execute(["%${puestobuscado}%"]);
        $puesto = $query->fetchAll(PDO::FETCH_OBJ);

        return $puesto;
    }



    function getUsuarioLogueado()
    {
        //obtengo el usuario de la base de datos         
        $query = $this->db->prepare("SELECT*FROM usuario WHERE email=?");
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }



    function getpasswordLogueado()
    {
        //obtengo el password de la base de datos         
        $query = $this->db->prepare("SELECT*FROM usuario WHERE password=?");
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
