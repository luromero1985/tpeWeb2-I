<?php
class AutentificacionHelper
{
   //pregunto si está logueado

   public function chequeoLogueo()
   {
      session_start();
      if (empty($_SESSION['usuarioId'])) { //con que pregunte una cosa me alcanza para saber si está logueado
         header("Location:" . LOGIN);
         die();
      }
   }


   public function usoAutenticacion()
   {
      session_start();
   }
}
