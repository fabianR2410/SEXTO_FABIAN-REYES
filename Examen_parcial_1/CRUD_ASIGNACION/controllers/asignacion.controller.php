<?php
//controlador de departamentos
require_once '../models/asignacion.model.php' ;
// reporte de error
$asignacion= new Asignaciones ;

switch ($_GET["op"]) {
    case 'todos':
        $dax = array();
        $dax = $Asignaciones->todos();
        while ($row = mysqli_fetch_assoc($dax)) {
            $todosss[] = $row;
        }
        echo json_encode($todosss);
        break;
    case 'uno':
        $idAsignacion = $_GET['idAsignacion'];
        $dax = array();
        $dax = $asignacion->uno($idAsignacion);
        $res = mysqli_fetch_assoc($dax);
        echo json_encode($res);
        break;
        //insertar
    case 'insertar':
        $idAsignacion = $_POST["idAsignacion"];
        $idEmpleados = $_POST["idEmpleados"];
        $idDepartamentos = $_POST["idDepartamentos"];
        $FechaAsignacion = $_POST["FechaAsignacion"];
        $dax = array();
        $dax = $asignacion->insertar($idAsignacion,$idDepartamentos,$idEmpleados,$FechaAsignacion);
        echo json_encode($dax);
        break;
    case 'actualizar':
        $idAsignacion = $_POST["idAsignacion"];
        $idEmpleados = $_POST["idEmpleados"];
        $idDepartamentos = $_POST["idDepartamentos"];
        $FechaAsignacion = $_POST["FechaAsignacion"];
        $dax = array();
        $dax = $asignacion->actualizar($idAsignacion, $idEmpleados, $idDepartamentos, $FechaAsignacion);
        echo json_encode($dax);
        break;
        case 'eliminar':
            $idAsignacion = $_POST["idAsignacion"];
            $dax = array();
            $dax = $asignacion->eliminar($idAsignacion);
            echo json_encode($dax);
        break;
}
