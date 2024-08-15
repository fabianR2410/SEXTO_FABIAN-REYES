<?php
require_once '../config/inias.php';

class Asignacion
{
    //funsion conectar
    public function todos()
    {
        $conect = new ClaseConectar();
        $conect = $conect->procedimientoparaconectar();
        $cadena = "SELECT * FROM asignacion";
        $dax = mysqli_query($conect, $cadena);
        return $dax;
    }
    public function uno ($idAsignacion)
    {
        $conect = new ClaseConectar();
        $conect = $conect->procedimientoparaconectar();
        $cadena = "SELECT * FROM asignacion WHERE idAsignacion=$idAsignacion";
        $dax = mysqli_query($conect, $cadena);
        return $dax;
    }
    //funsion insertar
    public function insertar ($idAsignacion, $idEmplados, $idDepartamentos, $Fecha_asignacion,) //inserta asignacion
    {
        try {
            //codigo insertar
            $conect = new ClaseConectar();
            $conect = $conect->procedimientoparaconectar();
            $cadena = "INSERT INTO  asignacion (idAsignacion, idEmplados, idDepartamentos, Fecha_asignacion) VALUES ('$idAsignacion', '$idEmplados', '$idDepartamentos', '$Fecha_asignacion')";
         if (mysqli_query($conect, $cadena)) {
            return $conect->insert_id;
        } else {
            return $conect->error;
              }
            } catch (Exception $a) {
                return $a->getMessage();
            } finally {
                $conect->close();
        }
        }

    
           //funsion actualizar
           public function actualizar ($idAsignacion, $idEmplados, $idDepartamentos, $Fecha_asignacion)
           {
               try {
                   //codigo para actualizar
               $conect = new ClaseConectar();
               $conect = $conect->procedimientoparaconectar();
               $cadena = "UPDATE  asignacion SET idEmplados='$idEmplados', idDepartamentos='$idDepartamentos', Fecha_asignacion='$Fecha_asignacion' WHERE idAsignacion=$idAsignacion";
               if (mysqli_query($conect, $cadena)) {
                   return $idAsignacion;
               } else {
                   return $conect->error;
               }
           } catch (Exception $a) {
               return $a->getMessage();
           } finally {
               $conect->close();
       }
       }

               //fundion eliminar
               public function eliminar ($idAsignacion)
               {
                   try {
                       //codigo para eliminar
                       $conect = new ClaseConectar();
                       $conect = $conect->procedimientoparaconectar();
                       $cadena = "DELETE FROM asignacion WHERE idAsignacion=($idAsignacion)";
                       if (mysqli_query($conect, $cadena)) {
                           return $idAsignacion;
                       } else {
                           return $conect->error;
                       }
                   } catch (Exception $a) {
                       return $a->getMessage();
                   } finally {
                       $conect->close();
                   }
               }

    
    }
