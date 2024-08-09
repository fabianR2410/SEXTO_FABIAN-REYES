<?php
require_once ('../config/base.php');

class Producto
{
    //funsion conectar
    public function todos()
    {
   $con = new ClaseConectar();
   $con = $con->ProcedimientoConectar();
   $cadena = "SELECT * FROM producto";
   $datos = mysqli_query($con, $cadena);
   return $data;
    }
    public function uno($idProducto)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM producto WHERE idProducto=$idProducto";
        $datos = mysqli_query($con, $cadena);
        return $data;
    }
    //FUNSION INSERTAR
    public function insertar($NombreProducto, $Descripcion, $Precio, $StockInicial, $IDCategorias)
    {
        try {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO productos (`IDProducto`, `NombreProducto`, `Descripcion`, `Precio`, `StockInicial`, `IDCategorias`) VALUES ($NombreProducto, $Descripcion, $Precio, $StockInicial, $IDCategorias)";
    if (mysqli_query($con, $cadena)) {
        return $con ->insert_id;
        } else {
       return $con -> error;
        }
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    //FUNSION ACTUALIZAR
    public function actualizar($idProducto, $NombreProducto, $Descripcion, $Precio, $StockInicial, $IDCategorias)
    {
            try {
                //codigo actualizar
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE producto SET NombreProducto='$NombreProducto', Descripcion='$Descripcion', Precio=$Precio, StockInicial=$StockInicial, IDCategorias=$IDCategorias WHERE idProducto=$idProducto";
    if (mysqli_query($con, $cadena)) {
        return $IDProducto;
        } else {
       return $con -> error;
        }
    } catch (Exception $th) {
        return $th->getMessage();
    } finally {
        $con->close();
    } 
    }
    //FUNSION ELIMINAR
    public function eliminar($idProducto)
    {
        try {
            //codigo eliminar
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM producto WHERE idProducto=$idProducto";
    if (mysqli_query($con, $cadena)) {
        return $idProducto;
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