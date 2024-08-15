<?php
//controlador de emplaeados
require_once '../models/empleados.model.php' ;
// reporte de error
$empleado= new Emplados ;

switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $empleado->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno':
        $idEmplado = $_POST["idEmplado"];
        $datos = array();
        $datos = $empleado->uno($idEmplado);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    case 'insertar':
        $Nombre = $_POST["nombre"];
        $Apellido = $_POST["apellido"];
        $Correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $datos = array();
        $datos = $empleado->insertar($idEmplado,$Nombre, $Apellido, $Correo,$telefono);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $idEmplado = $_POST["idempleado"];
        $Nombre = $_POST["nombre"];
        $Apellido = $_POST["apellido"];
        $Corrreo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $datos = array();
        $datos = $empleado->actualizar($idEmplado,$Nombre, $Apellido, $Corrreo, $telefono);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $idEmplado = $_POST["idempleado"];
        $datos = array();
        $datos = $empleado->eliminar($idEmplado);
        echo json_encode($datos);
        break;
}