<?php
require_once '../config/inias.php';

class Asignaciones
{
    //funsion conectar
    public function todosss()
    {
        $conect = new ClaseConectar();
        $conect = $conect->procedimientoparaconectar();
        $cadena = "SELECT * FROM Asignaciones";
        $dax = mysqli_query($conect, $cadena);
        return $dax;
    }
    public function uno ($idAsignacion)
    {
        $conect = new ClaseConectar();
        $conect = $conect->procedimientoparaconectar();
        $cadena = "SELECT * FROM Asignaciones WHERE idAsignacion=$idAsignacion";
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
            $cadena = "INSERT INTO  Asignaciones (idAsignacion, idEmplados, idDepartamentos, Fecha_asignacion) VALUES ('$idAsignacion', '$idEmplados', '$idDepartamentos', '$Fecha_asignacion')";
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
               $cadena = "UPDATE  Asignaciones SET idEmplados='$idEmplados', idDepartamentos='$idDepartamentos', Fecha_asignacion='$Fecha_asignacion' WHERE idAsignacion=$idAsignacion";
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
                       $cadena = "DELETE FROM Asignaciones WHERE idAsignacion=($idAsignacion)";
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
