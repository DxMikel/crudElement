<?php
require_once "./model/empleados.php";



$accion = $_POST["accion"];

if(isset($accion)){
    switch($accion){
        case "ver":
            verTodo();
        break;
        case "agregar":
            agregar();
        break;
        case "formulario":
            formulario();
        break;
        case "guardaEditar":
            guardarEditar();
        break;
        case "eliminar":
            eliminar();
        break;
    }
}
function verTodo(){
    $empleados = new Empleados();
    ?>
        <table class="table table-hover">
        <thead>
        <tr>
            <th>Id Empleado</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Sueldo</th>
            <th>Puesto</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        foreach($empleados->getAll() as $resultado){
            ?>
            <tr>
                <td><?php echo $resultado->Id_Empleado ?></td>
                <td><?php echo $resultado->Nombre ?></td>
                <td><?php echo $resultado->Apellidos ?></td>
                <td><?php echo $resultado->Sueldo ?></td>
                <td><?php echo $resultado->Puesto ?></td>
                <td><button onClick="editar(<?php echo $resultado->Id_Empleado ?>)">Editar</button><button onClick="borrar(<?php echo $resultado->Id_Empleado ?>)">Borrar</button></td>
            </tr>
            <?php
            }
        ?>
        </tbody>
        </table>
    <?php
}
function agregar(){
    $empleados = new Empleados();
    if(isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["sueldo"]) && isset($_POST["puesto"])){
        $empleados->nombre = $_POST["nombre"];
        $empleados->apellidos = $_POST["apellidos"];
        $empleados->sueldo = $_POST["sueldo"];
        $empleados->puesto = $_POST["puesto"];

        $empleados->create();

        ?>
        <script>alert("El empleaddo se ha creado con exito);</script>
        <?php
    }
}
function formulario(){
    ?>
    <div>
        <?php 
            if(isset($_POST["idEmpleado"])){
                $empleados = new Empleados();
                $resultado = $empleados->getById($_POST["idEmpleado"]);
                ?>
                    <input type="hidden" id="idEmpleado" value="<?php echo $_POST["idEmpleado"] ?>">
                    <label for="nombre">Nombre: </label>
                    <input type="text" id="nombre" value="<?php echo $resultado[0]->Nombre?>">
                    <label for="apellidos">Apellidos: </label>
                    <input type="text" id="apellidos" value="<?php echo $resultado[0]->Apellidos?>">
                    <label for="sueldo">Sueldo: </label>
                    <input type="number" id="sueldo" value="<?php echo $resultado[0]->Sueldo?>">
                    <label for="puesto">Puesto: </label>
                    <input type="text" id="puesto" value="<?php echo $resultado[0]->Puesto?>">
                    <button id="guardar" onClick="<?php echo $_POST["submit"] ?>">Guardar</button>
                <?php
            }else{
                ?>
                <label for="nombre">Nombre: </label>
                <input type="text" id="nombre" placeholder="Inserte el nombre">
                <label for="apellidos">Apellidos: </label>
                <input type="text" id="apellidos" placeholder="Inserte los apellidos">
                <label for="sueldo">Sueldo: </label>
                <input type="number" id="sueldo" placeholder="Inserte el sueldo">
                <label for="puesto">Puesto: </label>
                <input type="text" id="puesto" placeholder="Inserte el puesto">
                <button id="guardar" onClick="<?php echo $_POST["submit"] ?>">Guardar</button>
                <?php
            }
        ?>
        </div>
    <?php
}
function guardarEditar(){
    $empleados = new Empleados();

    if(isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["sueldo"]) && isset($_POST["puesto"])){
        $empleados->id = $_POST["id"];
        $empleados->nombre = $_POST["nombre"];
        $empleados->apellidos = $_POST["apellidos"];
        $empleados->sueldo = $_POST["sueldo"];
        $empleados->puesto = $_POST["puesto"];

        $empleados->update();

        ?>
        <script>alert("El empleaddo se ha creado con exito);</script>
        <?php
    }
}
function eliminar(){
    $empleados = new Empleados();
    $empleados->eliminar($_POST["idEmpleado"]);
}
?>
