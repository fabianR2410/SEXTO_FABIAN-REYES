<?php
// controlador de clientes
require_once '../models/cliente.model.php' ;

//error_reporting(0);
$cliente = new  Clientes ;

switch ($_GET["op"]) {
//TODO: operaciones de clientes
    case 'todos':
        $datos = array(); //seteo respuesta
        $datos = $cliente->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $Idcliente = $_POST["Idcliente"];
        $datos = array(); //seteo respuesta
        $datos = $clientes->uno($idcliente);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $datos = array(); //seteo respuesta
        $datos = $clientes->insertar($nombre, $apellido, $correo, $telefono, $direccion);
        echo json_encode($dat);
        break;

    case 'actualizar':
        $idcliente = $_POST["Idcliente"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $datos = array(); //seteo respuesta
        $datos = $cliente->actualizar($Idcliente, $nombre, $apellido, $correo, $telefono, $direccion);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $idcliente = $_POST["Idcliente"];
        $datos = array(); //seteo respuesta
        $datos = $cliente->eliminar($Idcliente);
        echo json_encode($dat);
        break;
}