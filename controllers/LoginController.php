<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {
        $router->render("auth/login");
        //echo "Desde login";
    }

    public static function logout()
    {
        echo "Desde logout";
    }

    public static function olvide(Router $router)
    {
        $router->render("auth/olvide-password", []);
        //echo "Desde olvide";
    }

    public static function recuperar(Router $router)
    {

        //echo "Desde recuperar";
    }

    public static function crear(Router $router)
    {

        $usuario = new Usuario;

        // Alertas Vacias
        $alertas = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            //echo "Enviaste el formulario";


            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();
            
            //Revisar que alerta este vacio
            if(empty($alertas)){
                //Verifica que el usuario no este registrado

                $resultado = $usuario->existeUsuario();

                if($resultado->num_rows){
                    $alertas = Usuario::getAlertas();
                }
                else {
                    //Hashear el Password
                    $usuario->hashPassword();
                    
                    // Generar un Token Único
                    $usuario->crearToken();
                    
                    //Enviar el Email
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
                    $email->enviarConfirmacion();

                    //Crear el usuario
                    $resultado = $usuario->guardar();
                    if($resultado){
                        header("Location: /mensaje");
                    }  
                    //debuguear($usuario);
                }
            }

            //Verificar que el usuario no este registrado
        }

        $router->render("auth/crear-cuenta", [
            "usuario" => $usuario,
            "alertas" => $alertas
        ]);
        //echo"Desde Crear";
    }
    
    public static function mensaje(Router $router){
        $router->render("auth/mensaje");
    }

    public static function confirmar(Router $router){
        $alertas = [];

        $token = s($_GET["token"]);

        $usuario = Usuario::where("token", $token);

        if(empty($usuario)){
            Usuario::setAlerta("Error", "Token no valido");
        }else{
            //echo "Token valído, cofirmando usuario..";
            $usuario -> confirmado = "1";
            $usuario -> token = null;
            $usuario ->guardar();
            Usuario::setAlerta("exito", "Cuenta Comprobada Correctamente");
        }
        $alertas = Usuario::getAlertas();
        $router->render("auth/confirmar-cuenta", [
            "alertas" => $alertas
        ]);
    }
}
