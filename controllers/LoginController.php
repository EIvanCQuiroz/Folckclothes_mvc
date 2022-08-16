<?php 

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController{
    public static function login(Router $router){
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();

            if (empty($alertas)) {
                $usuario = Usuario::where('email', $auth->email);

                if ($usuario) {
                    //verificar usuario
                    if ($usuario->comprobarPassNdVerifi($auth->password)){

                        session_start();

                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;

                        //redirec
                        if ($usuario->admin === "1") {
                            $_SESSION['admin'] = $usuario->admin ?? null;
                            header('Location: /admin');
                        }else{
                            header('Location: /cita');
                        }
                    }
                }else{
                    Usuario::setAlerta('error', 'Usuario no encontrado');
                }
            }
        }

        $alertas = Usuario::getAlertas();
        
        $router -> render('auth/login', [
            'alertas' => $alertas
        ]);
    }

    public static function logout(){
        session_start();
        $_SESSION=[];
        header('Location: /');
    }

    public static function forgot(Router $router){

        $alertas=[];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Usuario($_POST);
            $alertas = $auth->validarEmail();

            if (empty($alertas)) {
                $usuario = Usuario::where('email', $auth->email);

                if ($usuario && $usuario->confirmado === "1") {
                    
                    $usuario->crearToken();
                    $usuario->guardar();

                    //nuevo email
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
                    $email->enviarInstrucciones();
                    //Revisar cosas por hacer
                    Usuario::setAlerta('exito', 'Revisa la bandeja de entrada de tu email :o ');


                }else{
                    Usuario::setAlerta('error', 'El usuario no existe o no esta confirmado :( ');
                    
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router -> render('auth/forgot-pass', [
            'alertas' => $alertas
        ]);
    }

    public static function recuperar(Router $router){

        $alertas = [];
        $error = false;

        $token = s($_GET['token']);

        //Buscar a usuario por su token 
        $usuario = Usuario::where ('token', $token);

        if (empty($usuario)) {
            Usuario::setAlerta('error', 'Token no valido :(');
            $error = true;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Leer el password
            $password = new Usuario($_POST);
            $alertas = $password-> validarPassword();

            if(empty($alertas))
            {
                $usuario->password = null;

                $usuario->password = $password->password;
                $usuario->hashPassword();
                $usuario->token = null;

                $resultado = $usuario->guardar();
                if ($resultado) {
                    header('Location: /');
                }
            }
        }     

        $alertas = Usuario::getAlertas();
        $router->render('auth/recuperar-pass',[
            'alertas'=> $alertas,
            'error' => $error
        ]);
    }

    public static function registrar(Router $router){
    
        $usuario = new Usuario;

        //alertas vacias
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            //Si alertas esta vacio (VALIDACION)
            if (empty($alertas)) {
                //verificar registro usuario
                $resultado = $usuario->existeUsuario();

                if ($resultado->num_rows) 
                {
                    $alertas = Usuario::getAlertas();
                } else 
                {

                    //hashear el password
                    $usuario->hashPassword();

                    //token autenticar
                    $usuario->crearToken();


                    //email autenticar
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
                    $email -> enviarConfirmacion();

                    //Crear usuario
                    $resultado = $usuario->guardar();
                    if ($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }

        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
            ]);
    }   

    public static function mensaje(Router $router){

        $router->render('auth/mensaje');
    }

    public static function confirmar(Router $router){
        
        $alertas=[];

        $token = s($_GET['token']);

        $usuario = Usuario::where('token', $token);

        if (empty($usuario)) {
            //vacio
            Usuario::setAlerta('error', 'Token no valido');

        }else{
            //confirmado
            $usuario->confirmado = "1";
            $usuario->token = null;
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Cuenta comprobada correctamente!, felicidades y bienvenido :) ');
        }

        $alertas = Usuario::getAlertas();
        $router->render('auth/confirmar-ac', [
            'alertas' => $alertas
        ]);
    }
}