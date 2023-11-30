<?php

namespace Controllers;
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

    public static function crear(Router $router) {
        
        $usuario = new Usuario;

        // Alertas Vacias
        $alertas = [];
        if($_SERVER["REQUEST_METHOD"] === "POST") {
            //echo "Enviaste el formulario";
            
            
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            
        }

        $router->render("auth/crear-cuenta",[ 
            "usuario" => $usuario,
            "alertas" => $alertas
        ]);
        //echo"Desde Crear";
    }

}
