<?php
//controlador de departamentos
require_once '../models/departamentos.model.php' ;
// reporte de error
$departamentos= new Departamentos ;

switch ($_GET["op"]) {
    case 'todoss':
        $dato = array();
        $dato = $departamentos->todos();
        while ($row = mysqli_fetch_assoc($dato)) {
            $todoss[] = $row;
        }
        echo json_encode($todoss);
        break;
    case 'uno':
        $idDepartamentos = $_POST["idDepartamentos"];
        $dato = array();
        $dato = $departamentos->uno($idDepartamentos);
        $res = mysqli_fetch_assoc($dato);
        echo json_encode($res);
        break;
    case 'insertar':
        $Nombre_Departamento = $_POST["Nombre_Departamento"];
        $Ubicacion = $_POST["Ubicacion"];
        $Jefe_Departamento = $_POST["Jefe_Departamento"];
        $Extension = $_POST["Extension"];
        $dato = array();
        $dato = $empleado->insertar($idDepartamentos,$Nombre_Departamento, $Ubicacion, $Jefe_Departamento, $Extension);
        echo json_encode($dato);
        break;
    case 'actualizar':
        $idDepartamentos = $_POST["idDepartamentos"];
        $Nombre_Departamento = $_POST["Nombre_Departamento"];
        $Ubicacion = $_POST["Ubicacion"];
        $Jefe_Departamento = $_POST["Jefe_Departamento"];
        $Extension = $_POST["Extension"];
        $dato = array();
        $dato = $departamentos->actualizar($idDepartamentos, $Nombre_Departamento, $Ubicacion, $Jefe_Departamento, $Extension);
        echo json_encode($dato);
        break;
        case 'eliminar':
        $idDepartamentos = $_POST["idDepartamentos"];
        $dato = array();
        $dato = $departamentos->eliminar($idDepartamentos);
        echo json_encode($dato);
        break;
}