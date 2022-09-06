<?php

    require_once("../Controlador/controladorEstudiante.php");

    header("content-Type: application/json");

    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':
            $controlador = new controladorEstudiante;
            if(isset($_GET['id']))
            {
                $registro = $controlador->buscar($_GET['id']);
                ECHO json_encode($registro);
            }else
            {
                $registros = $controlador->lista();
                ECHO json_encode($registros);
            }
        break;

        case 'POST':
            if(isset($_POST['nombre'])){
                echo $_POST['nombre'];
            }
            $_POST = json_decode(file_get_contents('php://input'),true);
            $controlador = new controladorEstudiante;
            ECHO $registro = $controlador->registrar
            (
                $_POST['nombre'],
                $_POST['paterno'],
                $_POST['materno'],
                $_POST['email']
            );

        break;

        case 'PUT':
            $_PUT = json_decode(file_get_contents('php://input'),true);
            if(isset($_GET['id'])){
                $controlador = new controladorEstudiante;
                ECHO $registro = $controlador->actualizar
                (
                    $_PUT['nombre'],
                    $_PUT['paterno'],
                    $_PUT['materno'],
                    $_PUT['email'],
                    $_GET['id']
                );
            }

        break;

        case 'DELETE':
            if(isset($_GET['id']))
                $controlador = new controladorEstudiante;
                ECHO $regisrto = $controlador->eliminar($_GET['id']);
        break;

    }

?>