<?php
require_once   ('C:\xampp\htdocs\SEXTO\SEMANA2_TAREA1_REYES_FABIAN\config/stat.php') ;
class Clientes
{

// funsion conectar
public function todos() //select * from clientes
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM clientes";
        $dat = mysqli_query($con, $cadena);
        return $dat;
    }
    public function uno($Idcliente) //select * from clientes where idCliente = $idCliente
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM clientes WHERE Idcliente = $Idcliente";
        $dat = mysqli_query($con, $cadena);
        return $dat;
    }
    //funsion insertar
    public function insertar($Idcliente, $Nombre, $Apellido, $Correo, $Telefono, $Direccion) //insert into provedores (nombre, direccion, telefono) values ($nombre, $direccion, $telefono)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO  clientes (Idcliente, Nombre, Apellido, Correo, Telefono, Direccion) VALUES ($Idcliente, '$Nombre', '$Apellido', '$Correo', '$Telefono', '$Direccion')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    //funsion actualizar
    public function actualizar($Idcliente, $Nombre, $Apellido, $Correo, $Telefono, $Direccion)
    {
        try {
        //codigo para actualizar
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "UPDATE clientes SET Nombre =$Idcliente='Idcliente', '$Nombre', Apellido = '$Apellido', Correo = '$Correo', Telefono = '$Telefono', Direccion = '$Direccion'";
        if (mysqli_query($con, $cadena)) {
            return $Idcliente;
        } else {
            return $con->error;
        }
    } catch (Exception $th) {
        return $th->getMessage();
    } finally {
        $con->close();
    }
    
    }
}