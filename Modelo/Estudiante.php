<?php

    require_once ("DB.php");

    class Estudiante extends DB
    {
        PRIVATE $id;
        PRIVATE$nombre;
        PRIVATE $paterno;
        PRIVATE $materno;
        PRIVATE $email;
        PRIVATE $tabla ='estudiantes';

        public function insertarId(int $id){
            $this->id = $id;
        }

        public function insertarNombre(String $nombre){
            $this->nombre = $nombre;
        }

        public function insertarPaterno(String $paterno){
            $this->paterno = $paterno;
        }
        public function insertarMaterno(String $materno){
            $this->materno = $materno;
        }
        public function insertaremail(String $email){
            $this->email = $email;
        }

    public function consultarNombre(){
        return $this->nombre;
    }
    public function consultarPaterno(){
        return $this->paterno;
    }
    public function consultarMaterno(){
        return $this->materno;
    }
    public function consultarEmail(){
        return  $this->email;
    }
    public function consultarId(){
        return  $this->id;
        }

    #Insertar
    public function insertar($registro)
    {
        $conexion = parent::conectar();
        try
        {
            $query =
            (
                "INSERT INTO public.".$this->tabla."
                (nombre, paterno, materno, email)
                VALUES ('".$registro->consultarNombre()."',
                '".$registro->consultarPaterno()."',
                '".$registro->consultarMaterno()."',
                '".$registro->consultarEmail()."')"
            );

                $insertar = $conexion->prepare($query)->execute();
                return $insertar;
        }
        catch(Exception $ex)
        {
            exit('ERRO :'.$ex->getMessage());
        }
    }

    #consultar

        public function consultar()
        {
            $conexion = parent::conectar();
            try{
                $query = "SELECT * FROM ".$this->tabla;
                $consulta = $conexion->query($query)->fetchAll(PDO::FETCH_ASSOC);
            return $consulta;
            }
            catch (Exception $ex)
            {
                exit('Error: '.$ex->getMessage());
            }
        }

        #modificar

        public function actualizar($registro)
        {
            $conexion = parent::conectar();
            try{
            $query =
                "UPDATE ".$this->tabla.
                " SET nombre = '".$registro->consultarNombre().
                "', paterno = '".$registro->consultarPaterno().
                "', materno = '".$registro->consultarMaterno().
                "', email = '".$registro->consultarEmail().
                "' WHERE id =".$registro->consultarId();
                $actualizar = $conexion->prepare($query)->execute();
            return $actualizar;

            }catch(Exception $ex){
                exit('ERROR: '.$ex->getMessage());
            }

        }

        #eliminar
        public function eliminar($accion,$registro)
        {
            $conexion = parent::conectar();

            if($accion == 'todos'){
            try{
                $sql  = "DELETE FROM public.estudiantes";
                $eliminar = $conexion->prepare($sql)->execute();
                return $eliminar;
            }
            catch (Exception $ex)
            {
                exit('ERROR:'.$ex->getMessage());

            }

            }else{
                try
                {
                    $sql  = "DELETE FROM public.estudiantes
                    WHERE id =".$registro;
                    $eliminar = $conexion->prepare($sql)->execute();
                    return $eliminar;
                }
                catch (Exception $ex)
                {
                    exit('ERROR:'.$ex->getMessage());

                }
            }

        }
        #Buscar estudiante Por Id
        public function consultarEstudiante($identificador)
        {
            $conexion = parent::conectar();
            try
            {
                $sql = "SELECT * FROM ".$this->tabla." WHERE id =".$identificador;
                $estudiante = $conexion->query($sql)->fetch(PDO::FETCH_ASSOC);
                return $estudiante;
            }
            catch(Exception $ex)
            {
                exit('Error:'.$ex->getMessage());
            }

        }
    }
