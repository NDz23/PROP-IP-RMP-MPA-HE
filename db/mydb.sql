-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 01, 2018 at 08:25 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deudas`
--

DROP TABLE IF EXISTS `tbl_deudas`;
CREATE TABLE IF NOT EXISTS `tbl_deudas` (
  `ID_DEUDA` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(255) NOT NULL,
  `CANTIDAD` decimal(10,2) NOT NULL,
  `ACREEDOR` varchar(255) NOT NULL,
  `CANT_PAGADA` decimal(10,2) NOT NULL DEFAULT '0.00',
  `FECHA` date NOT NULL,
  PRIMARY KEY (`ID_DEUDA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gastos`
--

DROP TABLE IF EXISTS `tbl_gastos`;
CREATE TABLE IF NOT EXISTS `tbl_gastos` (
  `ID_GASTO` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(255) NOT NULL,
  `CANTIDAD` decimal(10,2) NOT NULL,
  `FECHA` date NOT NULL,
  PRIMARY KEY (`ID_GASTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ingresos`
--

DROP TABLE IF EXISTS `tbl_ingresos`;
CREATE TABLE IF NOT EXISTS `tbl_ingresos` (
  `ID_INGRESO` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(255) NOT NULL,
  `CANTIDAD` decimal(10,2) NOT NULL,
  `FECHA` date NOT NULL,
  PRIMARY KEY (`ID_INGRESO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL,
  `CONTRASEÑA` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
