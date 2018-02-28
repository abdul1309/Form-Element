# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.33)
# Datenbank: library_oop
# Erstellt am: 2018-02-28 10:14:18 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_roles` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `address`, `date_of_birth`, `id_role`)
VALUES
	(1,'abed','c4ca4238a0b923820dcc509a6f75849b','ab.s@hotmail.com','Serig','sh','bergedorf','1991-09-12',2),
	(2,'kamel','6512bd43d9caa6e02c990b0a82652dca','kamel.sas@gmail.com','kamel','sas','Bergedorf','0000-00-00',3),
	(3,'samer','6512bd43d9caa6e02c990b0a82652dca','samer.khalof@gmail.com','Samer','khalof','Bergedorf','2002-02-02',3),
	(4,'khaled','6512bd43d9caa6e02c990b0a82652dca','sad.khalof@gmail.com','Sad','khalof','Bergedorf','0000-00-00',2),
	(5,'shad','c4ca4238a0b923820dcc509a6f75849b','ahmed.jedied@gmail.com','Ahmed','jdied','Altonaer ','1990-12-12',3),
	(6,'jak','d41d8cd98f00b204e9800998ecf8427e',' jason.muellllar@googlemail.com','jason','  mülar','Altonaer ','2000-02-11',3),
	(7,'tamer','6512bd43d9caa6e02c990b0a82652dca','tamer.hassen@hotmail.com','Tamer','hassen','Altonaer ','1111-11-11',2),
	(8,'mohamed','c4ca4238a0b923820dcc509a6f75849b','mohamend.shaddad@hotmail.com','Mohamed','Shaddad','Bergedorf','2000-02-11',1),
	(9,'wessam','c4ca4238a0b923820dcc509a6f75849b','wessau@hotmail.com','wessam','alzhrawe','a','0000-00-00',3);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle user_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `id_role` int(6) NOT NULL AUTO_INCREMENT,
  `name_role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;

INSERT INTO `user_roles` (`id_role`, `name_role`)
VALUES
	(1,'new'),
	(2,'admin'),
	(3,'user');

/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
