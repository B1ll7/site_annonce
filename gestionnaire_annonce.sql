/*
SQLyog Community
MySQL - 5.7.26 : Database - mlr1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `annonce` */

CREATE TABLE `annonce` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_EST_DEPOSEE_CONSULTEE` int(11) NOT NULL,
  `ID_APPARTIENT` int(11) NOT NULL,
  `ENTETE` varchar(128) DEFAULT NULL,
  `CORPS` varchar(255) DEFAULT NULL,
  `DATE_DEPOT` varchar(128) DEFAULT NULL,
  `DATE_VALIDITE` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `I_FK_ANNONCE_UTILISATEUR` (`ID_EST_DEPOSEE_CONSULTEE`),
  KEY `I_FK_ANNONCE_RUBRIQUE` (`ID_APPARTIENT`),
  CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`ID_EST_DEPOSEE_CONSULTEE`) REFERENCES `utilisateur` (`ID`),
  CONSTRAINT `annonce_ibfk_2` FOREIGN KEY (`ID_APPARTIENT`) REFERENCES `rubrique` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `annonce` */

insert  into `annonce`(`ID`,`ID_EST_DEPOSEE_CONSULTEE`,`ID_APPARTIENT`,`ENTETE`,`CORPS`,`DATE_DEPOT`,`DATE_VALIDITE`) values 
(1,2,2,'textile','je vends une echarpe','20.09.2019','13.11.2019'),
(2,2,3,'futur','developp`annonce`emnt durable','31.09.2019','13.11.2019'),
(3,2,1,'chapeau','je vends un chapeau','13.10.2019','13.11.2019');

/*Table structure for table `image` */

CREATE TABLE `image` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_POSSEDE` int(11) NOT NULL,
  `HREF_SRC` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `I_FK_IMAGE_ANNONCE` (`ID_POSSEDE`),
  CONSTRAINT `image_ibfk_1` FOREIGN KEY (`ID_POSSEDE`) REFERENCES `annonce` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `image` */

/*Table structure for table `param` */

CREATE TABLE `param` (
  `ID` int(11) NOT NULL,
  `DUREE_ANNONCE` char(32) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `param` */

/*Table structure for table `rubrique` */

CREATE TABLE `rubrique` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIBELLE` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `LIBELLE` (`LIBELLE`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `rubrique` */

insert  into `rubrique`(`ID`,`LIBELLE`) values 
(3,'Chanson'),
(2,'Guerre'),
(1,'Paix'),
(11,'Rambo');

/*Table structure for table `utilisateur` */

CREATE TABLE `utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MDP` varchar(128) DEFAULT NULL,
  `NOM` varchar(128) DEFAULT NULL,
  `PRENOM` varchar(128) DEFAULT NULL,
  `MAIL` varchar(128) DEFAULT NULL,
  `ADRESSE` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/*Data for the table `utilisateur` */

insert  into `utilisateur`(`ID`,`MDP`,`NOM`,`PRENOM`,`MAIL`,`ADRESSE`) values 
(1,'9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08','test','test','test@test.fr','test'),
(2,'b54ae0fe6238b3c7c0919f1ea02bcee17c50d8aca785512b0eeb8c212a6db881','chapeau','chinois','chapeauchinois@mp.fr','110 rue chapeauchinois, chapeauville'),
(3,'27c47b28fb5f4545bda5d276ab55d84ccf9cc790581904c72fecdb4d623ce049','ju','hyun','juhyund@mp.fr',''),
(4,'1b0b7e51ee5d8e25cc87c83d5b4fbe933d91e1a70f7ee27d98be29c348b04950','cash','jony','jonnycash@mp.fr','10 rue du rock, rockland'),
(5,'805e75c42bb3d9e9916162c8003a5cd4c826ea1bcb6bde09594eb25a7526cdb6','soeur','sourire','soeurosurire@mp.fr',''),
(6,'77cf6a9be9777b7893feb7bc1bee6b812bd9f18b02b873e3d39c7eade1348272','Trump','Donald','donaldtrump@usa.us','110 rue maison blanche,washington'),
(7,'50c10078b2686bcd6a2e2a44f296aaca8304c668bfdd217f0a62e126563a24ef','micheal','jackson','michaelJackson@usa.us','110 rue soulmain,washington DC'),
(8,'50c10078b2686bcd6a2e2a44f296aaca8304c668bfdd217f0a62e126563a24ef','micheal','jackson','michaelJackson@usa.us','110 rue soulmain,washington DC'),
(9,'5a11bb63392a7502cfa01522411eb7bd91b65d9ee222e0f08679ed5834158a10','micheal','jordan','michaelJordan@usa.us','110 rue jordanland,washington DC'),
(10,'0f6e2710a15b381ce1b7d5d9f591e3303ecd8ea48efb8e1a6f76e8d3868cc1b3','Depp','johny','deppjohny@usa.us','110 rue curseofblackpearl,carrabean'),
(11,'0f6e2710a15b381ce1b7d5d9f591e3303ecd8ea48efb8e1a6f76e8d3868cc1b3','Depp','johny','deppjohny@usa.us','110 rue curseofblackpearl,carrabean'),
(12,'0f6e2710a15b381ce1b7d5d9f591e3303ecd8ea48efb8e1a6f76e8d3868cc1b3','Depp','johny','deppjohny@usa.us','110 rue curseofblackpearl,carrabean'),
(13,'0f6e2710a15b381ce1b7d5d9f591e3303ecd8ea48efb8e1a6f76e8d3868cc1b3','Depp','johny','deppjohny@usa.us','110 rue curseofblackpearl,carrabean'),
(14,'0f6e2710a15b381ce1b7d5d9f591e3303ecd8ea48efb8e1a6f76e8d3868cc1b3','Depp','johny','deppjohny@usa.us','110 rue curseofblackpearl,carrabean'),
(15,'0f6e2710a15b381ce1b7d5d9f591e3303ecd8ea48efb8e1a6f76e8d3868cc1b3','Depp','johny','deppjohny@usa.us','110 rue curseofblackpearl,carrabean'),
(16,'0f6e2710a15b381ce1b7d5d9f591e3303ecd8ea48efb8e1a6f76e8d3868cc1b3','Depp','johny','deppjohny@usa.us','110 rue curseofblackpearl,carrabean'),
(18,'19c8c1cc55319903a3245e0f24f47a786c671d1ea4f441c010ba6d92a702aeab','Rugis','Rugis','rugis@Rugis.ru','Rugis 10 , RugisLand'),
(19,'19c8c1cc55319903a3245e0f24f47a786c671d1ea4f441c010ba6d92a702aeab','Rugis','Rugis','rugis@Rugis.ru','Rugis 10 , RugisLand'),
(20,'6510126aae54bb1a39c360955a0fc67b049b60100763aba7827a389a90d10da6','Balboa','Rocky','viensjetenmetune@danslagueule.fr','JAckson, RugisLand'),
(21,'6510126aae54bb1a39c360955a0fc67b049b60100763aba7827a389a90d10da6','Balboa','Rocky','viensjetenmetune@danslagueule.fr','JAckson, RugisLand'),
(22,'6510126aae54bb1a39c360955a0fc67b049b60100763aba7827a389a90d10da6','j\'ai changé','Rocky','viensjetenmetune@danslagueule.fr','JAckson, RugisLand'),
(23,'6510126aae54bb1a39c360955a0fc67b049b60100763aba7827a389a90d10da6','j\'ai changé','Rocky','viensjetenmetune@danslagueule.fr','JAckson, RugisLand'),
(24,'4387134784cf3aa4245b7fcf4ac045d0a449524e98ba5dab4955ff4631e89df9','damas',NULL,NULL,NULL),
(25,'4387134784cf3aa4245b7fcf4ac045d0a449524e98ba5dab4955ff4631e89df9','damas',NULL,NULL,NULL),
(26,'0bd41e61c17fb0c2e4ec6839a1d8cd0763341e9d7d3a61a7c62c046d2347244e','damas2',NULL,NULL,NULL),
(27,'0bd41e61c17fb0c2e4ec6839a1d8cd0763341e9d7d3a61a7c62c046d2347244e','damas',NULL,NULL,NULL);

/* Trigger structure for table `annonce` */

DELIMITER $$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tr_annonce_insert` BEFORE INSERT ON `annonce` FOR EACH ROW 
	BEGIN
		IF (NEW.date_depot IS NULL) 
			THEN SET NEW.date_depot = NOW();
		END IF;
		IF (NEW.date_validite IS NULL) 
			THEN SET NEW.date_validite = ADDDATE(CURDATE(), INTERVAL 21 DAY);
		END IF;
	END */$$


DELIMITER ;

/* Trigger structure for table `utilisateur` */

DELIMITER $$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `encrypt_insert` BEFORE INSERT ON `utilisateur` FOR EACH ROW 	set NEW.mdp = SHA2(NEW.mdp,256) */$$


DELIMITER ;

/* Procedure structure for procedure `deleteRubrique` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteRubrique`(`IDentry` int(11))
BEGIN
	DELETE FROM `rubrique` 
	WHERE `ID` = `IDentry`;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `identifiedUser` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `identifiedUser`(`MDPENTRY` varchar(128), NOMENTRY varchar(128))
BEGIN
	SELECT * FROM utilisateur WHERE NOM = NOMENTRY AND mdp = SHA2(MDPENTRY,256); 
    END */$$
DELIMITER ;

/* Procedure structure for procedure `insert_into_Rubrique` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_into_Rubrique`(LIBELLE varchar(128))
BEGIN
	INSERT INTO rubrique (LIBELLE) VALUES (libelle);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `insert_into_user` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_into_user`(mdp varchar(128), nom varchar(128), prenom varchar(128), mail varchar(128), adresse varchar(128))
BEGIN
	INSERT INTO utilisateur (mdp, nom, prenom, mail, adresse) VALUES (mdp, nom, prenom, mail, adresse);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `order_annonce` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `order_annonce`()
begin
		select * from annonce
		order by date_depot;
	end */$$
DELIMITER ;

/* Procedure structure for procedure `print_Rubrique` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `print_Rubrique`()
BEGIN
	SELECT * FROM rubrique;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `print_users` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `print_users`()
BEGIN
	select * from utilisateur;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `updateRubrique` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `updateRubrique`(`IDentry` INT(11), libelleEntry varchar(128))
BEGIN
	update rubrique
	set LIBELLE = libelleEntry
	WHERE `ID` = `IDentry`;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
