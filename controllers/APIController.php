<?php

namespace Controllers;
use Model\CitaServicio;
use Model\Servicio;
use Model\Cita;

class APIController {
    public static function index(){
        $servicios = Servicio::all();
        echo json_encode($servicios);
        
    }

    public static function guardar(){
        // Almacena la Cita y devuelve el ID
        $cita = new Cita($_POST);

        $resultado = $cita->guardar();

        $id = $resultado["id"];
        //Almacena los servicios con el ID de la Cita

        $idServicios = explode(",",$_POST["servicios"]);

        foreach($idServicios as $idServicios){
            $args =[ 
                "citaId" => $id,
                "servicioId" => $idServicios
            ];

            $citaServicio = new CitaServicio($args);
            $citaServicio->guardar();
        }

        echo json_encode(["resultado" => $resultado]);
    }
}