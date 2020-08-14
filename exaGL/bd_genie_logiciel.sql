-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 12 août 2020 à 21:27
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_genie_logiciel`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `getdegre`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getdegre` (IN `tel` VARCHAR(15))  BEGIN
    	DECLARE degreConv int;
    	IF EXISTS (SELECT numero FROM conversation WHERE numero=tel) THEN
            SET degreConv=(SELECT degre FROM conversation WHERE numero=tel);
            UPDATE conversation SET degre=degreConv+1, date_conversation=now() WHERE numero=tel;
	    ELSE 
            INSERT into conversation(numero,degre,date_conversation)VALUES(tel,1,now());
        END IF;
        SELECT degre FROM conversation WHERE numero=tel;
    END$$

DROP PROCEDURE IF EXISTS `getID`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getID` ()  BEGIN
	DECLARE id int;
    SET id=(SELECT id_matricule FROM matricule);
 UPDATE matricule SET id_matricule=id+1;
 SELECT id_matricule FROM matricule;
END$$

DROP PROCEDURE IF EXISTS `setUser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `setUser` (IN `_identifiant` VARCHAR(30), IN `_password` VARCHAR(30))  BEGIN
	DECLARE U_id int;
	DECLARE U_nom varchar(30);
    SET U_id =(select id_agent from listeutilisateur where identifiant=_identifiant AND mot_de_passe=_password);
    set U_nom =(select CONCAT(NOM,' ',PRENOM) AS NOM from listeutilisateur where identifiant=_identifiant AND mot_de_passe=_password);
    UPDATE user set matricule=U_id,NOM=U_nom;
END$$

DROP PROCEDURE IF EXISTS `sp_insertActualite`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertActualite` (IN `design` VARCHAR(255), IN `lien` VARCHAR(255), IN `agent` INT)  BEGIN
  	
	INSERT INTO actualite (DESIGNATION_ACTUALITE,LIEN,DATE_ACTUALITE,AGENT_ID,PRIORITE)
    	VALUES(design,lien,now(),agent,'True');

END$$

DROP PROCEDURE IF EXISTS `sp_insertAgent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertAgent` (IN `nom` VARCHAR(50), IN `postnom` VARCHAR(50), IN `prenom` VARCHAR(50), IN `sexe` VARCHAR(1), IN `etatCivil` VARCHAR(50), IN `fonction` VARCHAR(50), IN `telephone` VARCHAR(50), IN `adresse` VARCHAR(50))  BEGIN
	DECLARE id varchar(20);
    DECLARE matri int;
    SET id =(SELECT id_matricule FROM matricule);
    SET matri =(SELECT id_matricule FROM matricule);
	INSERT INTO agent (ID_AGENT,NOM,POSTNOM,PRENOM,SEXE,ETAT_CIVIL,FONCTION,TELEPHONE,ADRESSE,DATE_A)
  VALUES
(id,nom,postnom,prenom,sexe,etatCivil,fonction,telephone,adresse,now());
  UPDATE matricule set id_matricule=matri+1;
END$$

DROP PROCEDURE IF EXISTS `sp_insertConseil`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertConseil` (IN `design` VARCHAR(255), IN `lien` VARCHAR(255), IN `agent` INT)  BEGIN
INSERT INTO `conseil_voyageur`(`DESIGNATION_CONSEIL`, `LIEN`, `DATE_CONSEIL`, `AGENT_ID`,`PRIORITE`) VALUES (design,lien,now(),agent,'True');
END$$

DROP PROCEDURE IF EXISTS `sp_insertProtegezVous`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertProtegezVous` (IN `design` VARCHAR(255), IN `agent` INT)  BEGIN
	INSERT INTO protegez_vous (DESIGNATION_PROTEGEZ_VOUS,DATE_PROTEGEZ_VOUS,AGENT_ID,PRIORITE)
    	VALUES(design,now(),agent,'True');
END$$

DROP PROCEDURE IF EXISTS `sp_insertProvince`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertProvince` (IN `agent` INT)  BEGIN
	
    IF NOT EXISTS(SELECT * from province WHERE DESIGNATION_PROVINCE='BAS-UELE')THEN
    INSERT INTO province (DESIGNATION_PROVINCE,NOMBRE_CAS,NOMBRE_MORT,NOMBRE_GUERISON,DATE_PROVINCE,AGENT_ID)
    	VALUES ('BAS-UELE',0,0,0,now(),agent),
        		('EQUATEUR',0,0,0,now(),agent),
                ('HAUT-KATANGA',0,0,0,now(),agent),
                ('HAUT-LOMAMI',0,0,0,now(),agent),
                ('HAUT-UELE',0,0,0,now(),agent),
                ('ITURI',0,0,0,now(),agent),
                ('KASAI',0,0,0,now(),agent),
                ('KASAI-CENTRAL',0,0,0,now(),agent),
                ('KASAI-ORIENTAL',0,0,0,now(),agent),
                ('KINSHASA',0,0,0,now(),agent),
                ('KWANGO',0,0,0,now(),agent),
                ('KWILU',0,0,0,now(),agent),
                ('KONGO-CENTRAL',0,0,0,now(),agent),
        		('LOMAMI',0,0,0,now(),agent),
                ('LUALABA',0,0,0,now(),agent),
                ('MAINDOMBE',0,0,0,now(),agent),
                ('MANIEMA',0,0,0,now(),agent),
                ('MONGALA',0,0,0,now(),agent),
                ('NORD-KIVU',0,0,0,now(),agent),
                ('NORD-UBANGI',0,0,0,now(),agent),
                ('SANKURU',0,0,0,now(),agent),
                ('SUD-KIVU',0,0,0,now(),agent),
                ('SUD-UBANGI',0,0,0,now(),agent),
                ('TANGANYIKA',0,0,0,now(),agent),
                ('TSHOPO',0,0,0,now(),agent),
                ('TSHUAPA',0,0,0,now(),agent);
      END IF;       		
END$$

DROP PROCEDURE IF EXISTS `sp_insertQR`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertQR` (IN `quest` VARCHAR(255), IN `rep` VARCHAR(255), IN `agent` INT)  BEGIN
	INSERT INTO q_r (QUESTION,REPONSE,DATE_Q_R,AGENT_ID,PRIORITE)
    VALUES(quest,rep,now(),agent,'True');
    
END$$

DROP PROCEDURE IF EXISTS `sp_insertUtilisateur`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertUtilisateur` (IN `identifant` VARCHAR(30), IN `motdepasse` VARCHAR(30), IN `acces` INT, IN `agent` INT)  BEGIN
	IF EXISTS (SELECT AGENT_ID FROM utilisateur WHERE AGENT_ID=agent) THEN
         UPDATE utilisateur SET IDENTIFIANT=identifant,MOT_DE_PASSE=motdepasse,ACCES=acces WHERE AGENT_ID=agent;
       
     ELSE 
     	
     	INSERT INTO `utilisateur`(`IDENTIFIANT`, `MOT_DE_PASSE`, `ACCES`, 			`AGENT_ID`) VALUES (identifant,motdepasse,acces,agent);
   END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_updateActualite`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updateActualite` (IN `id` INT, IN `design` VARCHAR(255), IN `lien` VARCHAR(255), IN `agent` INT)  BEGIN
	UPDATE `actualite` SET `DESIGNATION_ACTUALITE`=design,`LIEN`=lien,`DATE_ACTUALITE`=now(),`AGENT_ID`=agent,`PRIORITE`='True' WHERE `ID_ACTUALITE`=id;
    	
END$$

DROP PROCEDURE IF EXISTS `sp_updateAgent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updateAgent` (IN `id` VARCHAR(20), IN `nom` VARCHAR(50), IN `postnom` VARCHAR(50), IN `prenom` VARCHAR(50), IN `sexe` VARCHAR(1), IN `etatCivil` VARCHAR(50), IN `fonction` VARCHAR(50), IN `telephone` VARCHAR(50), IN `adresse` VARCHAR(50))  BEGIN
	UPDATE agent SET NOM=nom,POSTNOM=postnom,PRENOM=prenom,SEXE=sexe,ETAT_CIVIL=etatCivil,
    FONCTION=fonction,TELEPHONE=telephone,ADRESSE=adresse,DATE_A=now() WHERE ID_AGENT=id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateConseil`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updateConseil` (IN `id` INT, IN `design` VARCHAR(255), IN `lien` VARCHAR(255), IN `agent` INT)  BEGIN

	UPDATE `conseil_voyageur` SET `DESIGNATION_CONSEIL`=design,`LIEN`=lien,`DATE_CONSEIL`=now(),`AGENT_ID`=agent,`PRIORITE`='True' WHERE `ID_CONSEIL`=id;

    
END$$

DROP PROCEDURE IF EXISTS `sp_updateProtegezVous`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updateProtegezVous` (IN `id` INT, IN `design` VARCHAR(255), IN `agent` INT)  BEGIN
	UPDATE protegez_vous SET DESIGNATION_PROTEGEZ_VOUS=design,
    	DATE_PROTEGEZ_VOUS=now(),AGENT_ID=agent,`PRIORITE`='True' WHERE ID_PROTEGEZ_VOUS=id;
    	
END$$

DROP PROCEDURE IF EXISTS `sp_updateProvince`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updateProvince` (IN `design` VARCHAR(30), IN `nbr_cas` INT, IN `nbr_mort` INT, IN `nbr_Gueri` INT, IN `agent` INT)  BEGIN

	UPDATE `province` SET `NOMBRE_CAS`=nbr_cas,`NOMBRE_MORT`=nbr_mort,`NOMBRE_GUERISON`=nbr_Gueri,`DATE_PROVINCE`=now(),`AGENT_ID`=agent WHERE  `DESIGNATION_PROVINCE`=design;
	

    	
END$$

DROP PROCEDURE IF EXISTS `sp_updateQR`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updateQR` (IN `id` INT, IN `quest` VARCHAR(255), IN `rep` VARCHAR(255), IN `agent` INT)  BEGIN
	UPDATE q_r SET QUESTION=quest,REPONSE=rep,DATE_Q_R=now(),AGENT_ID=agent,`PRIORITE`='True' WHERE ID_Q_R=id;
    
    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

DROP TABLE IF EXISTS `actualite`;
CREATE TABLE IF NOT EXISTS `actualite` (
  `ID_ACTUALITE` int(11) NOT NULL AUTO_INCREMENT,
  `DESIGNATION_ACTUALITE` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `LIEN` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `DATE_ACTUALITE` date DEFAULT NULL,
  `AGENT_ID` int(11) NOT NULL,
  `PRIORITE` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`ID_ACTUALITE`),
  KEY `fk_conseil_agent` (`AGENT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `actualite`
--

INSERT INTO `actualite` (`ID_ACTUALITE`, `DESIGNATION_ACTUALITE`, `LIEN`, `DATE_ACTUALITE`, `AGENT_ID`, `PRIORITE`) VALUES
(6, '*Mises Ã  jour continues:* Mises Ã  jour continues sur la maladie Ã  coronavirus (COVID-19) provenant de tous les mÃ©dias de l\'OMS.', 'https://www.who.int/emergencies/diseases/novel-coronavirus-2019/events-as-they-happen', '2020-08-12', 3, 'False'),
(7, '*Articles de presse:* Tous les communiquÃ©s de presse, dÃ©clarations et notes pour les mÃ©dias.', 'https://www.who.int/emergencies/diseases/novel-coronavirus-2019/media-resources/news', '2020-08-12', 3, 'False'),
(8, '*Point de presse*: Point de presse sur la maladie Ã  coronavirus (COVID-2019), y compris vidÃ©os, audio et transcriptions.', 'https://www.who.int/emergencies/diseases/novel-coronavirus-2019/media-resources/press-briefings', '2020-08-12', 3, 'True'),
(16, '*Rapports de situation:* Les rapports de situation fournissent les derniÃ¨res mises Ã  jour sur la flambÃ©e de maladie Ã  coronavirus.', 'https://www.who.int/emergencies/diseases/novel-coronavirus-2019/situation-reports/', '2020-08-12', 3, 'False');

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `ID_AGENT` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `NOM` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `POSTNOM` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `PRENOM` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `SEXE` char(1) COLLATE latin1_general_ci DEFAULT NULL,
  `ETAT_CIVIL` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `FONCTION` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `TELEPHONE` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `ADRESSE` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `DATE_A` date DEFAULT NULL,
  PRIMARY KEY (`ID_AGENT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`ID_AGENT`, `NOM`, `POSTNOM`, `PRENOM`, `SEXE`, `ETAT_CIVIL`, `FONCTION`, `TELEPHONE`, `ADRESSE`, `DATE_A`) VALUES
('202001', 'KALUMBUSA', 'SAMBI', 'CLEMENT', 'M', 'CELIBATAIRE', 'ADMINISTRATEUR', '0971317122', 'MABANGA NORD', '2020-03-03'),
('10003', 'MAWANGA', 'MWAZINIGI', 'VERONIQUE', 'F', 'Celibataire', 'sjzkmbxca', NULL, 'jabj', '2020-06-04');

-- --------------------------------------------------------

--
-- Structure de la table `conseil_voyageur`
--

DROP TABLE IF EXISTS `conseil_voyageur`;
CREATE TABLE IF NOT EXISTS `conseil_voyageur` (
  `ID_CONSEIL` int(11) NOT NULL AUTO_INCREMENT,
  `DESIGNATION_CONSEIL` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `LIEN` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `DATE_CONSEIL` date DEFAULT NULL,
  `AGENT_ID` int(11) NOT NULL,
  `PRIORITE` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`ID_CONSEIL`),
  KEY `fk_conseil_voyageur_agent` (`AGENT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `conseil_voyageur`
--

INSERT INTO `conseil_voyageur` (`ID_CONSEIL`, `DESIGNATION_CONSEIL`, `LIEN`, `DATE_CONSEIL`, `AGENT_ID`, `PRIORITE`) VALUES
(1, 'Pour des conseils sur la visite des marchÃ©s d\'animaux vivants:', 'https://www.who.int/health-topics/coronavirus/who-recommendations-to-reduce-risk-of-transmission-of-emerging-pathogens-from-animals-to-humans-in-live-animal-market', '2020-08-12', 3, 'True'),
(3, 'Pour des conseils sur les bonnes pratiques d\'hygiÃ¨ne alimentaire:', 'https://www.who.int/foodsafety/publications/consumer/en/5keys_en.pdf?ua=1&ua=1', '2020-08-12', 3, 'False'),
(6, 'Pour les derniers rapports de situation pour les zones touchÃ©es:', 'https://www.who.int/emergencies/diseases/novel-coronavirus-2019/situation-reports/', '2020-08-12', 3, 'False'),
(8, 'Pour les derniers conseils de voyage:', 'https://www.who.int/emergencies/diseases/novel-coronavirus-2019/travel-advice', '2020-08-12', 3, 'False');

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

DROP TABLE IF EXISTS `conversation`;
CREATE TABLE IF NOT EXISTS `conversation` (
  `numero` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `degre` int(11) NOT NULL,
  `date_conversation` date NOT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `conversation`
--

INSERT INTO `conversation` (`numero`, `degre`, `date_conversation`) VALUES
('0971317133', 2, '2020-04-04'),
('+243973157801', 0, '2020-04-04');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `listeutilisateur`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `listeutilisateur`;
CREATE TABLE IF NOT EXISTS `listeutilisateur` (
`ID_AGENT` varchar(20)
,`NOM` varchar(50)
,`PRENOM` varchar(50)
,`SEXE` char(1)
,`IDENTIFIANT` varchar(50)
,`MOT_DE_PASSE` varchar(10)
,`ACCES` int(11)
);

-- --------------------------------------------------------

--
-- Structure de la table `matricule`
--

DROP TABLE IF EXISTS `matricule`;
CREATE TABLE IF NOT EXISTS `matricule` (
  `id_matricule` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `matricule`
--

INSERT INTO `matricule` (`id_matricule`) VALUES
(10004);

-- --------------------------------------------------------

--
-- Structure de la table `protegez_vous`
--

DROP TABLE IF EXISTS `protegez_vous`;
CREATE TABLE IF NOT EXISTS `protegez_vous` (
  `ID_PROTEGEZ_VOUS` int(11) NOT NULL AUTO_INCREMENT,
  `DESIGNATION_PROTEGEZ_VOUS` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `DATE_PROTEGEZ_VOUS` date DEFAULT NULL,
  `AGENT_ID` int(11) NOT NULL,
  `PRIORITE` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`ID_PROTEGEZ_VOUS`),
  KEY `fk_protegez_vous_agent` (`AGENT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `protegez_vous`
--

INSERT INTO `protegez_vous` (`ID_PROTEGEZ_VOUS`, `DESIGNATION_PROTEGEZ_VOUS`, `DATE_PROTEGEZ_VOUS`, `AGENT_ID`, `PRIORITE`) VALUES
(1, 'Lavez-vous les mains frÃ©quemment, Ã‰vitez de vous toucher les yeux, la bouche et le nez, Couvrez-vous la bouche et le nez avec le pli du coude ou un mouchoir lorsque vous toussez ou Ã©ternuez, Ã‰vitez la foule', '2020-08-12', 3, 'False'),
(5, ' Restez chez vous si vous ne vous sentez pas bien - mÃªme en cas de fiÃ¨vre et toux lÃ©gÃ¨res, Si vous avez de la fiÃ¨vre, de la toux et des difficultÃ©s respiratoires, consultez un mÃ©decin le plus tÃ´t possible - mais appelez d\'abord par tÃ©lÃ©phone', '2020-08-12', 3, 'True');

-- --------------------------------------------------------

--
-- Structure de la table `province`
--

DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `ID_PROVINCE` int(11) NOT NULL AUTO_INCREMENT,
  `DESIGNATION_PROVINCE` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `NOMBRE_CAS` int(11) DEFAULT NULL,
  `NOMBRE_MORT` int(11) DEFAULT NULL,
  `NOMBRE_GUERISON` int(11) DEFAULT NULL,
  `DATE_PROVINCE` date DEFAULT NULL,
  `AGENT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PROVINCE`),
  KEY `fk_province_agent` (`AGENT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `province`
--

INSERT INTO `province` (`ID_PROVINCE`, `DESIGNATION_PROVINCE`, `NOMBRE_CAS`, `NOMBRE_MORT`, `NOMBRE_GUERISON`, `DATE_PROVINCE`, `AGENT_ID`) VALUES
(1, 'BAS-UELE', 24, 3, 4, '2020-08-12', 3),
(2, 'EQUATEUR', 23, 2, 3, '2020-05-12', 202001),
(3, 'HAUT-KATANGA', 22, 0, 0, '2020-06-02', 10003),
(4, 'HAUT-LOMAMI', 0, 0, 0, '2020-05-11', 202001),
(5, 'HAUT-UELE', 0, 0, 0, '2020-05-11', 202001),
(6, 'ITURI', 23, 3, 2, '2020-05-12', 202001),
(7, 'KASAI', 23, 12, 2, '2020-05-12', 202001),
(8, 'KASAI-CENTRAL', 0, 0, 0, '2020-05-11', 202001),
(9, 'KASAI-ORIENTAL', 23, 7, 5, '2020-05-15', 202001),
(10, 'KINSHASA', 0, 0, 0, '2020-05-11', 202001),
(11, 'KWANGO', 0, 0, 0, '2020-05-11', 202001),
(12, 'KWILU', 0, 0, 0, '2020-05-11', 202001),
(13, 'KONGO-CENTRAL', 0, 0, 0, '2020-05-11', 202001),
(14, 'LOMAMI', 0, 0, 0, '2020-05-11', 202001),
(15, 'LUALABA', 0, 0, 0, '2020-05-11', 202001),
(16, 'MAINDOMBE', 0, 0, 0, '2020-05-11', 202001),
(17, 'MANIEMA', 0, 0, 0, '2020-05-11', 202001),
(18, 'MONGALA', 0, 0, 0, '2020-05-11', 202001),
(19, 'NORD-KIVU', 0, 0, 0, '2020-05-11', 202001),
(20, 'NORD-UBANGI', 0, 0, 0, '2020-05-11', 202001),
(21, 'SANKURU', 0, 0, 0, '2020-05-11', 202001),
(22, 'SUD-KIVU', 49, 0, 4, '2020-06-06', 202001),
(23, 'SUD-UBANGI', 0, 0, 0, '2020-05-11', 202001),
(24, 'TANGANYIKA', 0, 0, 0, '2020-05-11', 202001),
(25, 'TSHOPO', 0, 0, 0, '2020-05-11', 202001),
(26, 'TSHUAPA', 0, 0, 0, '2020-05-11', 202001);

-- --------------------------------------------------------

--
-- Structure de la table `q_r`
--

DROP TABLE IF EXISTS `q_r`;
CREATE TABLE IF NOT EXISTS `q_r` (
  `ID_Q_R` int(11) NOT NULL AUTO_INCREMENT,
  `QUESTION` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `REPONSE` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `DATE_Q_R` date DEFAULT NULL,
  `AGENT_ID` int(11) NOT NULL,
  `PRIORITE` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`ID_Q_R`),
  KEY `fk_q_r_agent` (`AGENT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `q_r`
--

INSERT INTO `q_r` (`ID_Q_R`, `QUESTION`, `REPONSE`, `DATE_Q_R`, `AGENT_ID`, `PRIORITE`) VALUES
(1, '*La COVID-19 est-elle la mÃªme maladie que le SRAS?*', 'Non, le virus responsable de la COVID-19 et celui Ã  lâ€™origine du syndrome respiratoire aigu sÃ©vÃ¨re (SRAS) sont gÃ©nÃ©tiquement liÃ©s mais ils sont diffÃ©rents. Le SRAS est plus mortel mais beaucoup moins infectieux que la COVID-19. ', '2020-08-12', 3, 'False'),
(3, '*Dois-je porter un masque pour me protÃ©ger ?*', 'Il est important de se tenir informÃ© et de suivre les conseils de vos autoritÃ©s sanitaires nationales et locales, ainsi que de votre prestataire de soins de santÃ©.', '2020-08-12', 3, 'False'),
(4, '*Quelles sont les personnes qui devraient porter un masque en tissu ?*', 'En cas de transmission communautaire intense â€Žet en particulier dans les endroits oÃ¹ il est impossible de maintenir une distance dâ€™un mÃ¨tre', '2020-08-12', 3, 'True'),
(5, '*Qu\'est-ce qu\'un coronavirus?*', 'Les coronavirus forment une vaste famille de virus qui peuvent Ãªtre pathogÃ¨nes chez lâ€™homme et chez lâ€™animal. On sait que, chez lâ€™Ãªtre humain, ', '2020-08-12', 3, 'False'),
(6, '*Qu\'est-ce que la COVID-19?*', 'La COVID-19 est la maladie infectieuse causÃ©e par le dernier coronavirus qui a Ã©tÃ© dÃ©couvert. Ce nouveau virus et cette maladie Ã©taient inconnus avant lâ€™apparition de la flambÃ©e Ã  Wuhan (Chine) en dÃ©cembre 2019. ', '2020-08-12', 3, 'False');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `matricule` int(11) NOT NULL,
  `nom` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`matricule`, `nom`) VALUES
(202001, 'KALUMBUSA CLEMENT');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IDENTIFIANT` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `MOT_DE_PASSE` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `ACCES` int(11) DEFAULT NULL,
  `AGENT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDENTIFIANT`),
  KEY `fk_utilisateur_agent` (`AGENT_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IDENTIFIANT`, `MOT_DE_PASSE`, `ACCES`, `AGENT_ID`) VALUES
('sa', 'sa', 3, 202001),
('1234', '1234', 1, 10003);

-- --------------------------------------------------------

--
-- Structure de la vue `listeutilisateur`
--
DROP TABLE IF EXISTS `listeutilisateur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listeutilisateur`  AS  select `agent`.`ID_AGENT` AS `ID_AGENT`,`agent`.`NOM` AS `NOM`,`agent`.`PRENOM` AS `PRENOM`,`agent`.`SEXE` AS `SEXE`,`utilisateur`.`IDENTIFIANT` AS `IDENTIFIANT`,`utilisateur`.`MOT_DE_PASSE` AS `MOT_DE_PASSE`,`utilisateur`.`ACCES` AS `ACCES` from (`agent` join `utilisateur` on((`agent`.`ID_AGENT` = `utilisateur`.`AGENT_ID`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
