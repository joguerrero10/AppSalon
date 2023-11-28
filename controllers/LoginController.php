<?php

namespace Controllers;
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
        $router->render("auth/crear-cuenta",[ 

        ]);
        //echo"Desde Crear";
    }

}
