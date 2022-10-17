<?php
class ModeloUsuario
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=dbproyecto; charset=utf8', 'root', '');
    }



    function getUsuarioLogueado($email)
    {
        //obtengo el usuario de la base de datos         
        $query = $this->db->prepare("SELECT*FROM usuario WHERE email=?");
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ); //los modelos los cambio cuando hago refactory
    }



    function getpasswordLogueado()
    {
        //obtengo el password de la base de datos         
        $query = $this->db->prepare("SELECT*FROM usuario WHERE password=?");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
