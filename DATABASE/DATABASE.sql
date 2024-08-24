-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.37-MariaDB - Source distribution
-- Server OS:                    Linux
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ocbc_test
CREATE DATABASE IF NOT EXISTS `ocbc_test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ocbc_test`;

-- Dumping structure for table ocbc_test.jenis_transaksi
CREATE TABLE IF NOT EXISTS `jenis_transaksi` (
  `ijenis` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `debitcredit` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ijenis`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table ocbc_test.jenis_transaksi: ~4 rows (approximately)
DELETE FROM `jenis_transaksi`;
/*!40000 ALTER TABLE `jenis_transaksi` DISABLE KEYS */;
INSERT INTO `jenis_transaksi` (`ijenis`, `description`, `debitcredit`) VALUES
	(1, 'Setor Tunai', 'C'),
	(2, 'Beli Pulsa', 'D'),
	(3, 'Bayar Listrik', 'D'),
	(4, 'Tarik Tunai', 'D');
/*!40000 ALTER TABLE `jenis_transaksi` ENABLE KEYS */;

-- Dumping structure for table ocbc_test.nasabah
CREATE TABLE IF NOT EXISTS `nasabah` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table ocbc_test.nasabah: ~2 rows (approximately)
DELETE FROM `nasabah`;
/*!40000 ALTER TABLE `nasabah` DISABLE KEYS */;
INSERT INTO `nasabah` (`account_id`, `name`) VALUES
	(1, 'Nasabah 1'),
	(2, 'AAA');
/*!40000 ALTER TABLE `nasabah` ENABLE KEYS */;

-- Dumping structure for table ocbc_test.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `itransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `ijenis` int(11) DEFAULT NULL,
  `Amount` double DEFAULT NULL,
  PRIMARY KEY (`itransaksi`),
  KEY `account_id` (`account_id`),
  KEY `ijenis` (`ijenis`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table ocbc_test.transaksi: ~11 rows (approximately)
DELETE FROM `transaksi`;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` (`itransaksi`, `account_id`, `transaction_date`, `ijenis`, `Amount`) VALUES
	(1, 1, '2018-12-11', 1, 10000),
	(2, 1, '2018-12-11', 2, 5000),
	(3, 2, '2018-12-11', 1, 300000),
	(4, 2, '2018-12-11', 2, 200000),
	(5, 2, '2018-12-11', 3, 20000),
	(6, 2, '2018-12-11', 1, 1000000),
	(7, 2, '2018-12-11', 4, 80000),
	(8, 2, '2018-12-11', 2, 12000),
	(9, 2, '2018-12-11', 3, 88000),
	(10, 2, '2018-12-11', 3, 230000),
	(11, 2, '2018-12-11', 2, 10500);
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
