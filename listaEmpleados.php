<?php
require_once "./model/empleados.php";

$empleados = new Empleados();

// foreach($empleados->getAll() as $tablas){
//     print_r($tablas->Id_Empleado."\n");
//     print_r($tablas->Nombre);
// }
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
        </tr>
        <?php
        }
       ?>
    </tbody>
  </table>
