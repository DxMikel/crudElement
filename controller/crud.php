<?php
require_once "conexion.php";
abstract class Crud extends Conexion{
    private $tabla;
    private $pdo;

    public function __construct($tabla){
        $this->tabla = $tabla;
        $this->pdo = parent::conexion();
    }

    public function getAll(){
        try{
            $stm = $this->pdo->prepare("SELECT * FROM $this->tabla");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function getById($id){
        try{
            $stm = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE Id_Empleado=?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function eliminar($id){
        try{
            $stm = $this->pdo->prepare("DELETE FROM $this->tabla WHERE Id_Empleado=?");
            $stm->execute(array($id));
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    abstract function create();
    abstract function update();
}
?>