-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Examenp1
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Examenp1
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Examenp1` DEFAULT CHARACTER SET utf8 ;
USE `Examenp1` ;

-- -----------------------------------------------------
-- Table `Examenp1`.`Departamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Examenp1`.`Departamentos` (
  `idDepartamentos` INT(8) NOT NULL,
  `Nombre_depeartamentos` TEXT NOT NULL,
  `Ubicacion` TEXT NOT NULL,
  `Jefe_departamento` TEXT NOT NULL,
  `Extencion` TEXT NOT NULL,
  PRIMARY KEY (`idDepartamentos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Examenp1`.`Emplados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Examenp1`.`Emplados` (
  `idEmplados` INT(10) NOT NULL,
  `Nombre` TEXT NOT NULL,
  `Apellido` TEXT NOT NULL,
  `Correo` TEXT NOT NULL,
  `Telefono` TEXT NOT NULL,
  PRIMARY KEY (`idEmplados`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Examenp1`.`Asignaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Examenp1`.`Asignaciones` (
  `idAsignacion` INT(8) NOT NULL,
  `idEmplados` INT(10) NOT NULL,
  `idDepartamentos` INT(8) NOT NULL,
  `Fecha_asignacion` DATE NOT NULL,
  PRIMARY KEY (`idAsignacion`, `idEmplados`, `idDepartamentos`),
  INDEX `fk_Emplados_has_Departamentos_Departamentos1_idx` (`idDepartamentos` ASC) ,
  INDEX `fk_Emplados_has_Departamentos_Emplados_idx` (`idEmplados` ASC) ,
  CONSTRAINT `fk_Emplados_has_Departamentos_Emplados`
    FOREIGN KEY (`idEmplados`)
    REFERENCES `Examenp1`.`Emplados` (`idEmplados`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Emplados_has_Departamentos_Departamentos1`
    FOREIGN KEY (`idDepartamentos`)
    REFERENCES `Examenp1`.`Departamentos` (`idDepartamentos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
