<?php
require_once '../config/ini.php';
class Emplados
{
    //funsion conectar
    public function todos()
    {
        $cone = new ClaseConectar();
        $cone = $cone->procedimientoparaconectar();
        $cadena = "SELECT * FROM emplados";
        $datos = mysqli_query($cone, $cadena);
        return $datos;
    }
    public function uno($idEmplados)
    {
        $cone = new ClaseConectar();
        $cone = $cone->procedimientoparaconectar();
        $cadena = "SELECT * FROM emplados WHERE idEmplados = $idEmplados";
        $datos = mysqli_query($cone, $cadena);
        return $datos;
    }
    //funsion insertar
    public function insertar ($idEmplados,$Nombre,$Apellido,$Correo,$Telefono)//inserta empleado
    {
        try {
            //codigo insertar
            $cone = new ClaseConectar();
            $cone = $cone->procedimientoparaconectar();
            $cadena = "INSERT INTO emplados (idEmplados, Nombre, Apellido, Correo, Telefono) VALUES ('$idEmplados', '$Nombre', '$Apellido', '$Correo', '$Telefono')";
         if (mysqli_query($cone, $cadena)) {
            return $cone->insert_id;
        } else {
            return $cone->error;
              }
            } catch (Exception $e) {
                return $e->getMessage();
            } finally {
                $cone->close();
        }
        }
        
           //funsion actualizar
    public function actualizar($idEmplados, $Nombre, $Apellido, $Correo, $Telefono)
    {
        try {
            //codigo para actualizar
        $cone = new ClaseConectar();
        $cone = $cone->procedimientoparaconectar();
        $cadena = "UPDATE emplados SET Nombre='$Nombre', Apellido='$Apellido', Correo='$Correo', Telefono='$Telefono' WHERE idEmplados=$idEmplados";
        if (mysqli_query($cone, $cadena)) {
            return $idEmplados;
        } else {
            return $cone->error;
        }
    } catch (Exception $e) {
        return $e->getMessage();
    } finally {
        $cone->close();
}
}

        //fundion eliminar
public function eliminar($idEmplados)
{
    try {
        //codigo para eliminar
        $cone = new ClaseConectar();
        $cone = $cone->procedimientoparaconectar();
        $cadena = "DELETE FROM emplados WHERE idEmplados=$idEmplados";
        if (mysqli_query($cone, $cadena)) {
            return $idEmplados;
        } else {
            return $cone->error;
        }
    } catch (Exception $e) {
        return $e->getMessage();
    } finally {
        $cone->close();
    }
}
}