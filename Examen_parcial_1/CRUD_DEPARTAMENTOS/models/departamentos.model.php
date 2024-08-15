<?php
require_once '../config/inide.php';
class Departamentos
{
    //funsion conectar
    public function todos()
    {
        $conex = new ClaseConectar();
        $conex = $conex->procedimientoparaconectar();
        $cadena = "SELECT * FROM departamentos";
        $dato = mysqli_query($conex, $cadena);
        return $dato;
    }
    public function uno($idDepartamentos)
    {
        $conex = new ClaseConectar();
        $conex = $conex->procedimientoparaconectar();
        $cadena = "SELECT * FROM departamentos WHERE idDepartamentos = $idDepartamentos";
        $dato = mysqli_query($conex, $cadena);
        return $dato;
    }
    //funsion insertar
    public function insertar ($idDepartamentos,$Nombre_departamentos,$ubicacion,$Jefe_departamento,$Extencion) //inserta departamento
    {
        try {
            //codigo insertar
            $conex = new ClaseConectar();
            $conex = $conex->procedimientoparaconectar();
            $cadena = "INSERT INTO  departamentos (idDepartamentos, Nombre_departamentos, ubicacion, Jefe_departamento, Extencion) VALUES ('$idDepartamentos', '$Nombre_departamentos', '$ubicacion', '$Jefe_departamento', '$Extencion')";
         if (mysqli_query($conex, $cadena)) {
            return $conex->insert_id;
        } else {
            return $conex->error;
              }
            } catch (Exception $d) {
                return $d->getMessage();
            } finally {
                $conex->close();
        }
        }
        
           //funsion actualizar
    public function actualizar ($idDepartamentos,$Nombre_departamentos,$ubicacion,$Jefe_departamento,$Extencion)
    {
        try {
            //codigo para actualizar
        $conex = new ClaseConectar();
        $conex = $conex->procedimientoparaconectar();
        $cadena = "UPDATE  departamentos SET Nombre_departamentos='$Nombre_departamentos', ubicacion='$ubicacion', Jefe_departamento='$Jefe_departamento', Extencion='$Extencion' WHERE idDepartamentos=$idDepartamentos";
        if (mysqli_query($conex, $cadena)) {
            return $idDepartamentos;
        } else {
            return $conex->error;
        }
    } catch (Exception $d) {
        return $d->getMessage();
    } finally {
        $conex->close();
}
}

        //fundion eliminar
public function eliminar ($idDepartamentos)
{
    try {
        //codigo para eliminar
        $cone = new ClaseConectar();
        $cone = $cone->procedimientoparaconectar();
        $cadena = "DELETE FROM departamentos WHERE idEmplados=($idDepartamentos)";
        if (mysqli_query($cone, $cadena)) {
            return $idDepartamentos;
        } else {
            return $cone->error;
        }
    } catch (Exception $d) {
        return $d->getMessage();
    } finally {
        $cone->close();
    }
}
}