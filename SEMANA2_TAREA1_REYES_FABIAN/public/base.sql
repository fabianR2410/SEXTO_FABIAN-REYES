-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema debersemana02
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema debersemana02
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `debersemana02` DEFAULT CHARACTER SET utf8 ;
USE `debersemana02` ;

-- -----------------------------------------------------
-- Table `debersemana02`.`Clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `debersemana02`.`Clientes` (
  `Idcliente` INT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(100) NOT NULL,
  `Apellido` VARCHAR(100) NOT NULL,
  `Correo` VARCHAR(100) NOT NULL,
  `Telefono` VARCHAR(15) NOT NULL,
  `Direccion` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`Idcliente`),
  UNIQUE INDEX `Correo_UNIQUE` (`Correo` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `debersemana02`.`Pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `debersemana02`.`Pedido` (
  `idPedido` INT NULL AUTO_INCREMENT,
  `idCliente` INT NOT NULL,
  `FechaPedido` DATE NOT NULL,
  `Total` DECIMAL(10,2) NOT NULL,
  `Clientes_Idcliente` INT NOT NULL,
  PRIMARY KEY (`idPedido`),
  INDEX `fk_Pedidos_Clientes_idx` (`Clientes_Idcliente` ASC) ,
  CONSTRAINT `fk_Pedidos_Clientes`
    FOREIGN KEY (`Clientes_Idcliente`)
    REFERENCES `debersemana02`.`Clientes` (`Idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `debersemana02`.`Detalles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `debersemana02`.`Detalles` (
  `idDetalle` INT NULL,
  `idPedido` INT NOT NULL,
  `idProductos` INT NOT NULL,
  `Cantidad` INT NOT NULL,
  `PrecioUnitario` DECIMAL(10,2) NOT NULL,
  `Pedido_idPedido` INT NOT NULL,
  PRIMARY KEY (`idDetalle`),
  INDEX `fk_DetallePedido_Pedido1_idx` (`Pedido_idPedido` ASC) ,
  CONSTRAINT `fk_DetallePedido_Pedido1`
    FOREIGN KEY (`Pedido_idPedido`)
    REFERENCES `debersemana02`.`Pedido` (`idPedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `debersemana02`.`Productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `debersemana02`.`Productos` (
  `idProductos` INT NULL AUTO_INCREMENT,
  `NombreProducto` VARCHAR(100) NOT NULL,
  `Descripcion` TEXT NULL,
  `Precio` DECIMAL(10,2) NOT NULL,
  `Pedido_idPedido` INT NOT NULL,
  PRIMARY KEY (`idProductos`),
  INDEX `fk_Productos_Pedido1_idx` (`Pedido_idPedido` ASC) ,
  CONSTRAINT `fk_Productos_Pedido1`
    FOREIGN KEY (`Pedido_idPedido`)
    REFERENCES `debersemana02`.`Pedido` (`idPedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
