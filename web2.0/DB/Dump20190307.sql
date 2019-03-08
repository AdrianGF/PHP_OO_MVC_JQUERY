CREATE DATABASE  IF NOT EXISTS `bdproject` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bdproject`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bdproject
-- ------------------------------------------------------
-- Server version	5.6.38

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `idproject` int(11) NOT NULL,
  `like` int(7) NOT NULL,
  PRIMARY KEY (`idproject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (0,1);
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `idproject` int(11) NOT NULL AUTO_INCREMENT,
  `ProName` varchar(45) DEFAULT NULL,
  `ProType` varchar(45) DEFAULT NULL,
  `ProDesc` varchar(45) DEFAULT NULL,
  `Ubica` varchar(45) DEFAULT NULL,
  `Mail` varchar(45) DEFAULT NULL,
  `ProDateIni` varchar(45) DEFAULT NULL,
  `ProPrice` int(45) DEFAULT NULL,
  `Curr` varchar(45) DEFAULT NULL,
  `req` varchar(45) DEFAULT NULL,
  `ProImg` varchar(45) DEFAULT NULL,
  `ProDonate` int(45) DEFAULT '0',
  PRIMARY KEY (`idproject`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (173,'test01','game','1023010230120301203012321','12321kd12','a@g.com','2019/01/30',123,'€','req1:req2:req3:','/view/img/',0),(176,'pepe04','game','dkasodoasidjiossadadiodjas','Onti213','asdasda','2019/01/30',123,'€','','/view/img/',0),(177,'pepe05','game','dkasodoasidjiossadadiodjas','Onti213','asdasda','2019/01/30',123,'€','','/view/img/',0),(178,'pepe06','game','dkasodoasidjiossadadiodjas','Onti213','asdasda','2019/01/30',123,'€','req1:req2:','/view/img/',0),(184,'test07','game','qsafsdfs df assf as fas','Onti','a@g.com','2019/01/31',1233,'€','req1:req2:req3:','/view/img/',0),(185,'test09','art','werewew rew r wqe rwqe rwqr qw','Onti','a@g.com','2019/01/283454',213,'€','req1:','/view/img/',0),(186,'Alius','game','Esto es una descripción de tipo test.','Onti','a@g.com','2019/01/31',2500,'$','req1:req2:req3:','/view/img/',0),(187,'Andiamo','tecno','Esto es una descripción de tipo test con más ','Onti','rube@gmail.com','2019/01/25',80000,'€','req1:req2:req3:','/view/img/',0),(189,'TLOU','game','TESTETESTESTESTESTESTESESTTDSSF','Onti','a@g.com','2019/01/31',123,'€','req1:req2:','/view/img/',0),(191,'TWD','game','testetsestestestetsetssetste','Onti','a@g.com','2019/01/31',123,'€','req1:req2:req3:','/view/img/',0),(193,'CARDOOR','tecno','La mejor web del mundo','Onti','guanan@g.com','2019/01/31',10000,'€','req1:req2:req3:','/view/img/',0),(194,'DDGame01','game','Test text area de DDGame01','Valencia','a@g.com','2019/02/20',10000,'€','req1:req2:req3:','/view/img/',0),(195,'DDGame02','game','Test de text area de DDGame02','Ontinyent','a@g.com','2019/02/24',10000,'€','req1:req2:req3:','/view/img/',0),(196,'DDGame03','game','Test de text area DDGame03','Galicia','a@g.com','2019/02/24',10000,'€','req1:req2:req3:','/view/img/',0),(197,'DDArt01','art','Test de text area Art01','Xina','a@g.com','2019/02/20',90000,'€','req1:req2:req3:','/view/img/',30000),(198,'DDArt02','art','Test de Text area DDArt02','Torrent','a@g.com','2019/12/11',10000,'€','req1:req2:req3:','/view/img/',0),(199,'DDTec01','tecno','Test de Text area DDTec01','Palencia','a@g.com','2019/02/24',10000,'€','req1:req2:req3:','/view/img/',0);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop` (
  `idshop` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(45) DEFAULT NULL,
  `donate` varchar(45) DEFAULT NULL,
  `quanity` varchar(45) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idshop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop`
--

LOCK TABLES `shop` WRITE;
/*!40000 ALTER TABLE `shop` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` longtext,
  `avatar` varchar(45) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`idusers`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (21,'User01','User01@gmail.com','$2y$12$Q576Yt4DIamftUCS/11EXO2Y9RjXOFTmVIH4ZrJTPC.WhqD036HMa','http://i.pravatar.cc/150?u=User01@gmail.com',1),(22,'User02','User02@gmail.com','$2y$12$dw7jP3A2tk3/UtQRfZyOAOeIZRQVwE93vy.X2RmXTokKYsq/VDMLW','http://i.pravatar.cc/150?u=User02@gmail.com',1),(24,'Admin01','Admin01@gmail.com','$2y$12$qXGCdD.k/PYACG.ILN.3vOwJ0TofTf4YH6zT.n5woSJF63y2Hbfn6','http://i.pravatar.cc/150?u=Admin01@gmail.com',0),(25,'Rubén16','Ruben@gmail.com','$2y$12$RxbOUCPSxbWEnL4PSiLhIOZOM5RgVB8WXKYe5Us55TNGIHYAliIyK','http://i.pravatar.cc/150?u=Ruben@gmail.com',1),(26,'Adrian','adriangf@gmail.com','$2y$12$cAyHB7Xu5d0efNcaK9L.IOOWojOuo141y1s0V1GLXvfZBOCyMLIqu','http://i.pravatar.cc/150?u=adriangf@gmail.com',1),(27,'Merche','Merche2442@gmail.com','$2y$12$9Wf4sWWs2ICmmjJobsB7EeTYTdgAyMHBeRKuPS5T7GiVnWYI4nfNa','http://i.pravatar.cc/150?u=Merche2442@gmail.c',1),(28,'Juanan','Juanan@gmail.com','$2y$12$pW49Ttw7.j4lQIurphsOs.RizikmRr2IVpHtqtIr1uScf1D8aA4CW','http://i.pravatar.cc/150?u=Juanan@gmail.com',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-07 18:28:29
