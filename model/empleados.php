<?php
require_once "./controller/crud.php";
class Empleados extends Crud{
    private $id;
    private $nombre;
    private $apellidos;
    private $sueldo;
    private $puesto;
    const TABLA = "empleados";
    private $pdo;

    public function __construct(){
        parent::__construct(self::TABLA);
        $this->pdo = parent::conexion();
    }

    public function __set($nombre,$valor){
        $this->nombre = $valor;
    }
    public function __get($nombre){
        return $this->nombre = $value;
    }
    public function create(){
        try{
            $stm = $this->pdo->prepare("INSERT INTO ".self::TABLA."(Nombre, Apellidos,Sueldo,Puesto) VALUES (?,?,?,?)");
            $stm->execute(array($this->nombre,$this->apellidos,$this->Sueldo,$this->Puesto));
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function update(){
        try{
            $stm = $this->pdo->prepare("UPDATE ".self::TABLA." SET Nombre=?, Apellidos=?, Sueldo=?, Puesto=? WHERE id=?");
            $stm->execute(array($this->nombre,$this->apellidos,$this->Sueldo,$this->Puesto,$this->id));
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
?>