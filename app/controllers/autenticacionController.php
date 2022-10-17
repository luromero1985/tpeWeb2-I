<?php

class AutenticacionController extends Controller
{
    function mostrarFormularioLoguin()
    {
        $this->vistaAutenticacion->formularioLogin();
    }

    //chequeamos que el usuario y la contraseña sean correctas
    public function verificacionUsuario()
    {

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            //obtengo el usuario de la base de datos
            $usuarioLogueado = $this->modeloUsuario->getUsuarioLogueado($email);

            //si el usuario existe y la contraseña es correcta
            if ($usuarioLogueado && password_verify($password, $usuarioLogueado->password)) {
                //inicio sesion
                session_start();
                //cada vez que el usuario ingrese, se guardarán sus datos
                $_SESSION['usuarioId'] = $usuarioLogueado->id;
                $_SESSION['usuarioEmail'] = $usuarioLogueado->email;
                $_SESSION['logueado'] = true;
                header("Location:" . BASE_URL);
            } else {
                $this->vistaAutenticacion->formularioLogin('El usuario o la clave son incorrectos, intente nuevamente');
            }
        }
    }


    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }
}
