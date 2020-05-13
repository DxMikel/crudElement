<?php
class Conexion{
    private $driver = "mysql";
    private $host = "localhost";
    private $usuario = "root";
    private $password = "";
    private $nombreDB = "empleados";
    private $caracteres = "utf8";

    protected function conexion(){
        try{
            $pdo = new PDO("{$this->driver}:host={$this->host};dbname={$this->nombreDB};charset={$this->caracteres}",$this->usuario,$this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
?>