-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema debersem2producto
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema debersem2producto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `debersem2producto` DEFAULT CHARACTER SET utf8 ;
USE `debersem2producto` ;

-- -----------------------------------------------------
-- Table `debersem2producto`.`Categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `debersem2producto`.`Categorias` (
  `IDCategorias` INT NOT NULL AUTO_INCREMENT,
  `NombreCategoria` VARCHAR(100) NOT NULL,
  `Descripcion` TEXT NOT NULL,
  PRIMARY KEY (`IDCategorias`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `debersem2producto`.`Proveedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `debersem2producto`.`Proveedores` (
  `IDProveedores` INT NULL AUTO_INCREMENT,
  `NombreProveedor` VARCHAR(100) NOT NULL,
  `Contacto` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`IDProveedores`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `debersem2producto`.`Productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `debersem2producto`.`Productos` (
  `IDProducto` INT NULL AUTO_INCREMENT,
  `NombreProducto` VARCHAR(100) NOT NULL,
  `Descripcion` TEXT NULL,
  `Precio` DECIMAL(10,2) NOT NULL,
  `StockInicial` INT NOT NULL,
  `IDCategorias` INT NOT NULL,
  PRIMARY KEY (`IDProducto`),
  INDEX `fk_Productos_Categorias1_idx` (`IDCategorias` ASC) ,
  CONSTRAINT `fk_Productos_Categorias1`
    FOREIGN KEY (`IDCategorias`)
    REFERENCES `debersem2producto`.`Categorias` (`IDCategorias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `debersem2producto`.`Kardex`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `debersem2producto`.`Kardex` (
  `IDMovimiento` INT NULL AUTO_INCREMENT,
  `FechaMovimiento` DATETIME NOT NULL,
  `TipoMovimiento ENUM` INT NOT NULL,
  `Cantidad` INT NOT NULL,
  `IDProducto` INT NOT NULL,
  `StockPrevio` INT NOT NULL,
  `IDProducto` INT NOT NULL,
  PRIMARY KEY (`IDMovimiento`),
  INDEX `fk_Kardex_Productos1_idx` (`IDProducto` ASC) ,
  CONSTRAINT `fk_Kardex_Productos1`
    FOREIGN KEY (`IDProducto`)
    REFERENCES `debersem2producto`.`Productos` (`IDProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `debersem2producto`.`Proveedores_has_Productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `debersem2producto`.`Proveedores_has_Productos` (
  `IDProveedores` INT NOT NULL,
  `IDProducto` INT NOT NULL,
  PRIMARY KEY (`IDProveedores`, `IDProducto`),
  INDEX `fk_Proveedores_has_Productos_Productos1_idx` (`IDProducto` ASC) ,
  INDEX `fk_Proveedores_has_Productos_Proveedores1_idx` (`IDProveedores` ASC) ,
  CONSTRAINT `fk_Proveedores_has_Productos_Proveedores1`
    FOREIGN KEY (`IDProveedores`)
    REFERENCES `debersem2producto`.`Proveedores` (`IDProveedores`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Proveedores_has_Productos_Productos1`
    FOREIGN KEY (`IDProducto`)
    REFERENCES `debersem2producto`.`Productos` (`IDProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
