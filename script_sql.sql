-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.26 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para pasarela
CREATE DATABASE IF NOT EXISTS `pasarela` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pasarela`;


-- Volcando estructura para tabla pasarela.bank
CREATE TABLE IF NOT EXISTS `bank` (
  `bankCode` varchar(4) NOT NULL,
  `bankName` varchar(60) NOT NULL,
  PRIMARY KEY (`bankCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pasarela.bank: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `bank` DISABLE KEYS */;
/*!40000 ALTER TABLE `bank` ENABLE KEYS */;


-- Volcando estructura para tabla pasarela.person
CREATE TABLE IF NOT EXISTS `person` (
  `document` varchar(12) NOT NULL COMMENT 'Número de identificación de la persona',
  `documentType` varchar(3) NOT NULL COMMENT 'Tipo de documento de identificación de la persona [CC, CE, TI, PPN]',
  `firstName` varchar(60) NOT NULL COMMENT 'Nombres',
  `lastName` varchar(60) NOT NULL COMMENT 'Apellidos',
  `company` varchar(60) NOT NULL COMMENT 'Nombre de la compañía',
  `emailAddress` varchar(80) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `country` varchar(2) NOT NULL COMMENT 'código ISO 3166-1, mayúscula sostenida',
  `phone` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  PRIMARY KEY (`documentType`,`document`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pasarela.person: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
/*!40000 ALTER TABLE `person` ENABLE KEYS */;


-- Volcando estructura para tabla pasarela.psetransactionrequest
CREATE TABLE IF NOT EXISTS `psetransactionrequest` (
  `bankCode` varchar(4) NOT NULL,
  `bankInterface` char(1) NOT NULL,
  `returnURL` varchar(255) NOT NULL,
  `reference` varchar(32) NOT NULL COMMENT 'Referencia única de pago',
  `description` varchar(255) NOT NULL,
  `language` char(2) NOT NULL COMMENT 'Idioma esperado en formato ISO 631-1',
  `currency` char(3) NOT NULL COMMENT 'Moneda a usar en formato ISO 4217',
  `totalAmount` double NOT NULL COMMENT 'Valor total a recaudar',
  `taxAmount` double NOT NULL COMMENT 'Discriminación del impuesto aplicado',
  `devolutionBase` double NOT NULL COMMENT 'Base de devolución para el impuesto',
  `tipAmount` double NOT NULL COMMENT 'Propina u otros valores exentos de impuesto',
  `ipAddress` varchar(15) NOT NULL,
  `userAgent` varchar(255) NOT NULL,
  `additionalData` varchar(500) NOT NULL,
  PRIMARY KEY (`reference`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Estructura que representa una solicitud de transacción con débitos a cuenta PSE';

-- Volcando datos para la tabla pasarela.psetransactionrequest: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `psetransactionrequest` DISABLE KEYS */;
/*!40000 ALTER TABLE `psetransactionrequest` ENABLE KEYS */;


-- Volcando estructura para tabla pasarela.psetransactionresponse
CREATE TABLE IF NOT EXISTS `psetransactionresponse` (
  `transactionID` bigint(20) unsigned NOT NULL COMMENT 'Identificador único de la transacción en PlaceToPay',
  `sessionID` varchar(32) NOT NULL,
  `returnCode` varchar(30) NOT NULL COMMENT 'success, fail_xxx',
  `trazabilityCode` varchar(40) NOT NULL,
  `transactionCycle` int(10) unsigned NOT NULL,
  `bankCurrency` varchar(3) NOT NULL COMMENT 'Moneda en formato ISO 4217',
  `bankFactor` float NOT NULL COMMENT 'Factor de conversión de la moneda',
  `bankURL` varchar(255) NOT NULL,
  `responseCode` int(10) unsigned NOT NULL COMMENT 'Estados; 0=FAILED, 1=APPROVED, 2=DECLINED, 3=PENDING',
  `responseReasonCode` varchar(3) NOT NULL COMMENT 'Código interno de respuesta de la operación',
  `responseReasonText` varchar(255) NOT NULL COMMENT 'Mensaje asociado con el código de respuesta de la operación',
  PRIMARY KEY (`transactionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pasarela.psetransactionresponse: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `psetransactionresponse` DISABLE KEYS */;
/*!40000 ALTER TABLE `psetransactionresponse` ENABLE KEYS */;


-- Volcando estructura para tabla pasarela.transactioninformation
CREATE TABLE IF NOT EXISTS `transactioninformation` (
  `transactionID` bigint(20) unsigned NOT NULL,
  `sessionID` varchar(32) NOT NULL,
  `reference` varchar(32) NOT NULL,
  `requestDate` varchar(40) NOT NULL COMMENT 'Fecha de solicitud en formato ISO 8601',
  `bankProcessDate` varchar(40) NOT NULL COMMENT 'Fecha de procesamiento en formato ISO 8601',
  `onTest` tinyint(1) NOT NULL COMMENT 'Indica si esta o no en modo pruebas',
  `returnCode` varchar(30) NOT NULL COMMENT 'Código de respuesta de la transacción',
  `trazabilityCode` varchar(40) NOT NULL COMMENT 'Código único de seguimiento',
  `transactionCycle` int(11) NOT NULL,
  `transactionState` varchar(20) NOT NULL COMMENT 'OK, NOT_AUTHORIZED, PENDING, FAILED',
  `responseCode` int(11) NOT NULL,
  `responseReasonCode` varchar(3) NOT NULL,
  `responseReasonText` varchar(255) NOT NULL,
  PRIMARY KEY (`transactionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Estructura con la respuesta a una solicitud de información de transacción.';

-- Volcando datos para la tabla pasarela.transactioninformation: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `transactioninformation` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactioninformation` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
