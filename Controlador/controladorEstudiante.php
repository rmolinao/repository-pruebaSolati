<?php

    include "../Modelo/Estudiante.php";

    class controladorEstudiante
    {

        public function lista(){
            $Obj = new Estudiante;
            return $Obj->consultar();
        }


        public function registrar($nombre,$paterno,$materno,$email){
            $estudiante = new Estudiante;
            $estudiante->insertarNombre($nombre);
            $estudiante->insertarPaterno($paterno);
            $estudiante->insertarMaterno($materno);
            $estudiante->insertaremail($email);
            return $estudiante->insertar($estudiante);
        }

        public function buscar($id){
            $estudiante = new Estudiante;
            return $estudiante->consultarEstudiante($id);
        }

        public function actualizar($nombre,$paterno,$materno,$email,$id){
            $estudiante = new Estudiante;
            $estudiante->insertarNombre($nombre);
            $estudiante->insertarPaterno($paterno);
            $estudiante->insertarMaterno($materno);
            $estudiante->insertaremail($email);
            $estudiante->insertarId($id);
            return $estudiante->actualizar($estudiante);
        }
        public function eliminar($id){
            $estudiante = new Estudiante;
            return $estudiante->eliminar('',$id);

        }

    }

?>