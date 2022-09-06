<?php
    const DB = 'pgsql';
    const DB_SERVIDOR ='localhost';
    abstract class DB{

        private static $db_servidor = DB_SERVIDOR;
        private static $db_nombre = 'prueba';
        private static $db_usuario = 'postgres';
        private static $db_pass = 'Isaac12345';

        public function conectar(){
            try{

                $dsn ="pgsql:host=".self::$db_servidor."; port =5432; dbname=".self::$db_nombre;
                $pdo = new PDO($dsn,self::$db_usuario,self::$db_pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                return $pdo;

            }catch(PDOException $pdoex){
                exit('ERROR:'.$pdoex->getMessage());
            }

        }

        abstract protected function insertar($registro);
        abstract protected function consultar();
        abstract protected function actualizar($registro);
        abstract protected function eliminar($accion,$registro);

    }
?>