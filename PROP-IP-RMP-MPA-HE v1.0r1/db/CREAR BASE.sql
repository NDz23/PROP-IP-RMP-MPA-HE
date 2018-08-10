-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`TBL_GASTOS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TBL_GASTOS` (
  `ID_GASTO` INT NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` VARCHAR(255) NOT NULL,
  `CANTIDAD` DECIMAL(10,2) NOT NULL,
  `FECHA` DATE NOT NULL,
  PRIMARY KEY (`ID_GASTO`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TBL_INGRESOS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TBL_INGRESOS` (
  `ID_INGRESO` INT NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` VARCHAR(255) NOT NULL,
  `CANTIDAD` DECIMAL(10,2) NOT NULL,
  `FECHA` DATE NOT NULL,
  PRIMARY KEY (`ID_INGRESO`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TBL_DEUDAS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TBL_DEUDAS` (
  `ID_DEUDA` INT NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` VARCHAR(255) NOT NULL,
  `CANTIDAD` DECIMAL(10,2) NOT NULL,
  `ACREEDOR` VARCHAR(255) NOT NULL,
  `CANT_PAGADA` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  `FECHA` DATE NOT NULL,
  PRIMARY KEY (`ID_DEUDA`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TBL_USUARIOS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TBL_USUARIOS` (
  `ID_USUARIO` INT NOT NULL AUTO_INCREMENT,
  `NOMBRE` VARCHAR(45) NOT NULL,
  `CONTRASENIA` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
