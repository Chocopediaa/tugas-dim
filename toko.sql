-- MariaDB dump 10.19-11.0.2-MariaDB, for osx10.18 (arm64)
--
-- Host: localhost    Database: toko
-- ------------------------------------------------------
-- Server version	11.0.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Barang`
--

DROP TABLE IF EXISTS `Barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Barang` (
  `IdBarang` int(5) NOT NULL,
  `NamaBarang` varchar(100) DEFAULT NULL,
  `Keterangan` varchar(100) DEFAULT NULL,
  `Satuan` varchar(10) DEFAULT NULL,
  `IdPengguna` int(5) DEFAULT NULL,
  `IdSupplier` int(5) DEFAULT NULL,
  PRIMARY KEY (`IdBarang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Barang`
--

LOCK TABLES `Barang` WRITE;
/*!40000 ALTER TABLE `Barang` DISABLE KEYS */;
INSERT INTO `Barang` VALUES
(1,'Sabun Mandi','Sabun untuk membersihkan tubuh','Batang',2,1),
(2,'Shampoo','Shampoo untuk membersihkan rambut','Botol',2,1),
(3,'Sikat Gigi','Sikat untuk membersihkan gigi','Buah',2,1),
(4,'Pasta Gigi','Pasta untuk membersihkan gigi','Tube',2,1),
(5,'Tissue','Tissue untuk membersihkan tangan atau muka','Bungkus',2,1),
(6,'Sapu','Sapu untuk membersihkan lantai','Buah',3,2),
(7,'Pel','Pel untuk membersihkan lantai','Buah',3,2),
(8,'Pembersih Lantai','Cairan untuk membersihkan lantai','Botol',3,2),
(9,'Korek Api','Korek api untuk menyalakan api','Bungkus',4,3),
(10,'Lilin','Lilin untuk penerangan atau dekorasi','Buah',4,3);
/*!40000 ALTER TABLE `Barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `HakAkses`
--

DROP TABLE IF EXISTS `HakAkses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `HakAkses` (
  `IdAkses` int(5) NOT NULL,
  `NamaAkses` varchar(10) DEFAULT NULL,
  `Keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdAkses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HakAkses`
--

LOCK TABLES `HakAkses` WRITE;
/*!40000 ALTER TABLE `HakAkses` DISABLE KEYS */;
INSERT INTO `HakAkses` VALUES
(1,'Admin','Hak akses penuh untuk semua fitur'),
(2,'User','Hak akses terbatas untuk fitur tertentu'),
(3,'Guest','Hak akses hanya untuk melihat data');
/*!40000 ALTER TABLE `HakAkses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pelanggan`
--

DROP TABLE IF EXISTS `Pelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pelanggan` (
  `IdPelanggan` int(5) NOT NULL,
  `NamaPelanggan` varchar(100) DEFAULT NULL,
  `NoTelepon` varchar(32) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdPelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pelanggan`
--

LOCK TABLES `Pelanggan` WRITE;
/*!40000 ALTER TABLE `Pelanggan` DISABLE KEYS */;
INSERT INTO `Pelanggan` VALUES
(1,'Rina','08123456789','Jl. Mangga No. 1'),
(2,'Rudi','08234567890','Jl. Durian No. 2'),
(3,'Rani','08345678901','Jl. Nanas No. 3'),
(4,'Rico','08456789012','Jl. Melon No. 4'),
(5,'Rara','08567890123','Jl. Pepaya No. 5');
/*!40000 ALTER TABLE `Pelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pembelian`
--

DROP TABLE IF EXISTS `Pembelian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pembelian` (
  `IdPembelian` int(5) NOT NULL,
  `JumlahPembelian` int(10) DEFAULT NULL,
  `HargaBeli` double DEFAULT NULL,
  `IdPengguna` int(5) DEFAULT NULL,
  `IdSupplier` int(5) DEFAULT NULL,
  PRIMARY KEY (`IdPembelian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pembelian`
--

LOCK TABLES `Pembelian` WRITE;
/*!40000 ALTER TABLE `Pembelian` DISABLE KEYS */;
INSERT INTO `Pembelian` VALUES
(1,1000,2000,2,1),
(2,2000,4000,2,2),
(3,3000,6000,3,3),
(4,4000,8000,3,4),
(5,5000,10000,4,5);
/*!40000 ALTER TABLE `Pembelian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pengguna`
--

DROP TABLE IF EXISTS `Pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pengguna` (
  `IdPengguna` int(5) NOT NULL,
  `NamaPengguna` varchar(100) DEFAULT NULL,
  `Password` varchar(32) DEFAULT NULL,
  `NamaDepan` varchar(50) DEFAULT NULL,
  `NamaBelakang` varchar(50) DEFAULT NULL,
  `NoHP` varchar(32) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `IdAkses` int(5) DEFAULT NULL,
  PRIMARY KEY (`IdPengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pengguna`
--

LOCK TABLES `Pengguna` WRITE;
/*!40000 ALTER TABLE `Pengguna` DISABLE KEYS */;
INSERT INTO `Pengguna` VALUES
(1,'admin','123456','Andi','Saputra','08123456789','Jl. Merdeka No. 1',1),
(2,'user1','abcdef','Budi','Wijaya','08234567890','Jl. Sudirman No. 2',2),
(3,'user2','ghijkl','Citra','Nugraha','08345678901','Jl. Thamrin No. 3',2),
(4,'user3','mnopqr','Dewi','Kusuma','08456789012','Jl. Gatot Subroto No. 4',2),
(5,'guest','stuvwx','Eka','Putri','08567890123','Jl. Diponegoro No. 5',3);
/*!40000 ALTER TABLE `Pengguna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Penjualan`
--

DROP TABLE IF EXISTS `Penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Penjualan` (
  `IdPenjualan` int(5) NOT NULL,
  `JumlahPenjualan` int(10) DEFAULT NULL,
  `HargaJual` double DEFAULT NULL,
  `IdPengguna` int(5) DEFAULT NULL,
  `IdPelanggan` int(5) DEFAULT NULL,
  PRIMARY KEY (`IdPenjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Penjualan`
--

LOCK TABLES `Penjualan` WRITE;
/*!40000 ALTER TABLE `Penjualan` DISABLE KEYS */;
INSERT INTO `Penjualan` VALUES
(1,10,5000,2,1),
(2,20,10000,2,2),
(3,30,15000,3,3),
(4,40,20000,3,4),
(5,50,25000,4,5);
/*!40000 ALTER TABLE `Penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Supplier`
--

DROP TABLE IF EXISTS `Supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Supplier` (
  `IdSupplier` int(5) NOT NULL,
  `NamaSupplier` varchar(100) DEFAULT NULL,
  `NoTelp` varchar(32) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdSupplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Supplier`
--

LOCK TABLES `Supplier` WRITE;
/*!40000 ALTER TABLE `Supplier` DISABLE KEYS */;
INSERT INTO `Supplier` VALUES
(1,'PT. Sinar Jaya','021123456','Jl. Raya Bogor No. 10'),
(2,'CV. Maju Mundur','022234567','Jl. Raya Bandung No. 20'),
(3,'UD. Selamat Datang','023345678','Jl. Raya Semarang No. 30'),
(4,'PT. Berkah Abadi','024456789','Jl. Raya Surabaya No. 40'),
(5,'CV. Sejahtera Bersama','025567890','Jl. Raya Denpasar No. 50');
/*!40000 ALTER TABLE `Supplier` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-30 16:34:56
