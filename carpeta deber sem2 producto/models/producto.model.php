<?php
require_once ('../config/base.php');

class Producto
{
    //funsion conectar
    public function todos()
    {
   $con = new ClaseConectar();
   $con = $con->ProcedimientoParaConectar();
   $cadena = "SELECT * FROM producto";
   $data = mysqli_query($con, $cadena);
   return $data;
    }
    public function uno($IDProducto)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM producto WHERE IDProducto=$IDProducto";
        $data = mysqli_query($con, $cadena);
        return $data;
    }
    //FUNSION INSERTAR
    public function insertar($NombreProducto, $Descripcion, $Precio, $StockInicial, $IDCategorias)
    {
        try {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "INSERT INTO productos (`IDProducto`, `NombreProducto`, `Descripcion`, `Precio`, `StockInicial`, `IDCategorias`) VALUES ($NombreProducto, $Descripcion, $Precio, $StockInicial, $IDCategorias)";
    if (mysqli_query($con, $cadena)) {
        return $con ->insert_id;
        } else {
       return $con -> error;
        }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    //FUNSION ACTUALIZAR
    public function actualizar($IDProducto, $NombreProducto, $Descripcion, $Precio, $StockInicial, $IDCategorias)
    {
            try {
                //codigo actualizar
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "UPDATE producto SET NombreProducto='$NombreProducto', Descripcion='$Descripcion', Precio=$Precio, StockInicial=$StockInicial, IDCategorias=$IDCategorias WHERE IDProducto=$IDProducto";
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
    public function eliminar($IDProducto)
    {
        try {
            //codigo eliminar
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "DELETE FROM producto WHERE IDProducto=$IDProducto";
    if (mysqli_query($con, $cadena)) {
        return $IDProducto;
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