-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: devkpltk_webappdb
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_users` (
  `adm_id` int(11) NOT NULL AUTO_INCREMENT,
  `adm_username` varchar(30) NOT NULL,
  `adm_password` varchar(30) NOT NULL,
  `adm_email` varchar(100) NOT NULL,
  `adm_is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`adm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'jayeshk','password','jayesh.kulkarni92@gmail.com',1,'2016-12-02 00:35:27','2016-12-02 00:35:27');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clean_sheets`
--

DROP TABLE IF EXISTS `clean_sheets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clean_sheets` (
  `crd_id` int(11) NOT NULL AUTO_INCREMENT,
  `mth_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`crd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clean_sheets`
--

LOCK TABLES `clean_sheets` WRITE;
/*!40000 ALTER TABLE `clean_sheets` DISABLE KEYS */;
/*!40000 ALTER TABLE `clean_sheets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fcm_info`
--

DROP TABLE IF EXISTS `fcm_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fcm_info` (
  `fcm_token` varchar(400) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fcm_info`
--

LOCK TABLES `fcm_info` WRITE;
/*!40000 ALTER TABLE `fcm_info` DISABLE KEYS */;
INSERT INTO `fcm_info` VALUES ('e2sEIfN2q-s:APA91bFlMJQw2jy0MqWObAZUEUooCT9o88b6V0nhOWfGl0QmoPASMi8cthRgk-5-QzV3LISEhdnQub6OA8NLXt51l85fF616LGWi6BfPK_eUPemHBYldV4qxG5HX-4VdODOW9ln49ENm'),('f1g5hggXD50:APA91bEJk0DeV3a_9UeGqybGAHBSP23lRjPCEDJ8RiOuQilDw4tAN1AEOTCyhJdgYE02NsPK8S8Lk-4dzXD4UAK-oMjPGpM1gQMsGnwXA0xFGHXDeMouC12lsYDh4Ein7ubruHQvMaGi'),('cNLMjl7_j-8:APA91bFAEYAdeSx4Kyy7stmuRPpxEOvRxB-q61dEQvMd-A-ARM4KLoz4u7HctCZ7TIvRnDlM1aRLFq-6k3-T5vYPzi0TqlRTpPQG9kpPZvDkCGTmt0Sx6z0CvGr5AbtheCwcv-_U41LO'),('cdBarozyV_g:APA91bEiHt1n9s0Vji96eqEKqyAMW0GXeQjs5CpV3EFAPsWOpCqpKqb-6ceWe-MksDYjsUtavCZNIkrj3t1abwnDbLLAyjJwxJJP1E8TpKndXZz8r_B8CfWnegCjrDTkkJ3WhaOMKasw');
/*!40000 ALTER TABLE `fcm_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `featured_players`
--

DROP TABLE IF EXISTS `featured_players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `featured_players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_name` varchar(60) DEFAULT NULL,
  `player_pos` varchar(40) DEFAULT NULL,
  `player_team` varchar(50) DEFAULT NULL,
  `matches_played` int(4) DEFAULT '0',
  `goals_scored` int(5) DEFAULT '0',
  `yellow_cards` int(5) DEFAULT '0',
  `red_cards` int(5) DEFAULT '0',
  `image` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `featured_players`
--

LOCK TABLES `featured_players` WRITE;
/*!40000 ALTER TABLE `featured_players` DISABLE KEYS */;
INSERT INTO `featured_players` VALUES (1,'dasasd','Def','asdad',NULL,NULL,NULL,NULL,'http://localhost/KPL-Admin/uploads/players/1480828775.jpg','2016-12-04 10:49:35','2016-12-04 10:49:35'),(2,'tsdsad','asdasd','asdas',0,0,0,0,'http://localhost/KPL-Admin/uploads/players/1480828935.jpg','2016-12-04 10:52:15','2016-12-04 10:52:15'),(3,'adas','aasdad','adsd',0,3,0,0,'http://localhost/KPL-Admin/uploads/players/1480828956.jpg','2016-12-04 10:52:36','2016-12-04 10:52:36');
/*!40000 ALTER TABLE `featured_players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goals`
--

DROP TABLE IF EXISTS `goals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goals` (
  `gl_id` int(11) NOT NULL AUTO_INCREMENT,
  `mth_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `gl_own` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`gl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goals`
--

LOCK TABLES `goals` WRITE;
/*!40000 ALTER TABLE `goals` DISABLE KEYS */;
/*!40000 ALTER TABLE `goals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match`
--

DROP TABLE IF EXISTS `match`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match` (
  `mth_id` int(11) NOT NULL AUTO_INCREMENT,
  `mth_home_team` varchar(50) NOT NULL,
  `mth_away_team` varchar(50) NOT NULL,
  `mth_result` varchar(50) NOT NULL,
  `mth_referee` varchar(50) NOT NULL,
  `mth_division` varchar(50) NOT NULL,
  `mth_date` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mth_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match`
--

LOCK TABLES `match` WRITE;
/*!40000 ALTER TABLE `match` DISABLE KEYS */;
/*!40000 ALTER TABLE `match` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `new_team`
--

DROP TABLE IF EXISTS `new_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `new_team` (
  `team_name` varchar(30) NOT NULL,
  `player_one` varchar(80) NOT NULL,
  `player_two` varchar(80) NOT NULL,
  `player_three` varchar(80) NOT NULL,
  `player_four` varchar(80) NOT NULL,
  `player_five` varchar(80) NOT NULL,
  `player_six` varchar(80) NOT NULL,
  `player_seven` varchar(80) NOT NULL,
  `player_eight` varchar(80) NOT NULL,
  `player_nine` varchar(80) NOT NULL,
  `player_ten` varchar(80) NOT NULL,
  `player_eleven` varchar(80) NOT NULL,
  `player_twelve` varchar(80) NOT NULL,
  `player_thirteen` varchar(80) NOT NULL,
  `player_fourteen` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `new_team`
--

LOCK TABLES `new_team` WRITE;
/*!40000 ALTER TABLE `new_team` DISABLE KEYS */;
INSERT INTO `new_team` VALUES ('DEVKPL','DEVKPL Jayesh sou@123','DEVKPL Jayesh jayesh@123','DEVKPL Sourabh sou@123','DEVKPL  ','DEVKPL  ','DEVKPL  ','DEVKPL  ','DEVKPL  ','DEVKPL  ','DEVKPL  ','DEVKPL  ','DEVKPL  ','DEVKPL  ','DEVKPL  ');
/*!40000 ALTER TABLE `new_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(50) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `content` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Hshsh','2016-11-10','http://devkpl.com/news/uploads/1.png','','Shshshz','Najakak','Hzjzjsjs','2016-11-28 00:42:35','2016-11-28 00:42:35'),(2,'Hshsh','2016-11-10','http://devkpl.com/news/uploads/1.png','','Shshshz','Najakak','Hzjzjsjs','2016-11-28 00:42:58','2016-11-28 00:42:58'),(3,'Fsfdfxfxf','2016-11-04','http://devkpl.com/news/uploads/2.png','','Xxcgg','Bnjknjj','Hfhfjchfhfhc vjvjvjvjcgzfzgcjvj','2016-11-28 00:57:20','2016-11-28 00:57:20'),(4,'Fsfdfxfxf','2016-11-04','http://devkpl.com/news/uploads/3.png','','Xxcgg','Bnjknjj','Hfhfjchfhfhc vjvjvjvjcgzfzgcjvj','2016-11-28 00:57:26','2016-11-28 00:57:26'),(5,'Demo','2016-11-29','http://devkpl.com/news/uploads/4.png','','Gggg','Ggggg','Gggggg','2016-11-28 19:12:25','2016-11-28 19:12:25'),(6,'Jnunjn','2016-11-16','http://devkpl.com/news/uploads/5.png','','By J','B b b b','Hey hbhn','2016-11-30 23:34:43','2016-11-30 23:34:43'),(7,'Jnunjn','2016-11-16','http://devkpl.com/news/uploads/6.png','','By J','B b b b','Hey hbhn','2016-11-30 23:35:02','2016-11-30 23:35:02'),(8,'Test','0000-00-00','http://localhost/KPL-Admin/uploads/players/1480753',NULL,'test',NULL,'test','2016-12-03 14:02:32','2016-12-03 14:02:32');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `red_cards`
--

DROP TABLE IF EXISTS `red_cards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `red_cards` (
  `crd_id` int(11) NOT NULL AUTO_INCREMENT,
  `mth_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`crd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `red_cards`
--

LOCK TABLES `red_cards` WRITE;
/*!40000 ALTER TABLE `red_cards` DISABLE KEYS */;
/*!40000 ALTER TABLE `red_cards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referees`
--

DROP TABLE IF EXISTS `referees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referees` (
  `ref_id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_name` varchar(50) NOT NULL,
  `ref_dob` datetime NOT NULL,
  `ref_matches` int(11) NOT NULL,
  `ref_difficulty_lvl` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ref_profile_pic` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`ref_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referees`
--

LOCK TABLES `referees` WRITE;
/*!40000 ALTER TABLE `referees` DISABLE KEYS */;
/*!40000 ALTER TABLE `referees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `tm_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm_code` int(100) NOT NULL,
  `tm_name` varchar(50) NOT NULL,
  `tm_logo` varchar(300) NOT NULL,
  `tm_home_color` varchar(50) NOT NULL,
  `tm_away_color` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,1480829699,'Test','http://localhost/KPL-Admin//uploads/1480829699.jpg','#315c8f','#1c9c1a','2016-12-04 11:04:59','2016-12-04 11:04:59');
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_info` (
  `name` text NOT NULL,
  `user_name` text NOT NULL,
  `user_pass` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_info`
--

LOCK TABLES `user_info` WRITE;
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT INTO `user_info` VALUES ('sourabh','admin','admin'),('jayesh','jayesh','jayesh');
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profiles` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_name` varchar(50) DEFAULT NULL,
  `usr_email` varchar(50) DEFAULT NULL,
  `usr_username` varchar(80) DEFAULT NULL,
  `usr_password` varchar(30) DEFAULT NULL,
  `usr_mobile_number` int(10) DEFAULT NULL,
  `usr_dob` datetime DEFAULT NULL,
  `usr_age` int(2) DEFAULT NULL,
  `usr_blood_grp` varchar(20) DEFAULT NULL,
  `usr_team_code` int(100) DEFAULT NULL,
  `usr_address` varchar(200) DEFAULT NULL,
  `usr_app_token_android` varchar(300) DEFAULT NULL,
  `usr_app_token_ios` varchar(300) DEFAULT NULL,
  `usr_deviceid_android` varchar(100) DEFAULT NULL,
  `usr_deviceid_ios` varchar(100) DEFAULT NULL,
  `mobile_alerts` tinyint(1) DEFAULT NULL,
  `usr_profile_pic` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profiles`
--

LOCK TABLES `user_profiles` WRITE;
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_stats`
--

DROP TABLE IF EXISTS `user_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_stats` (
  `stat_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_id` int(11) NOT NULL,
  `usr_goals` int(200) NOT NULL,
  `usr_cleansheets` int(200) NOT NULL,
  `usr_yellow_card` int(200) NOT NULL,
  `usr_red_card` int(200) NOT NULL,
  `usr_assist` int(200) NOT NULL,
  `usr_total_matches_played` int(200) NOT NULL,
  `usr_hattricks` int(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`stat_id`),
  UNIQUE KEY `usr_id` (`usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_stats`
--

LOCK TABLES `user_stats` WRITE;
/*!40000 ALTER TABLE `user_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yellow_cards`
--

DROP TABLE IF EXISTS `yellow_cards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yellow_cards` (
  `crd_id` int(11) NOT NULL AUTO_INCREMENT,
  `mth_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`crd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yellow_cards`
--

LOCK TABLES `yellow_cards` WRITE;
/*!40000 ALTER TABLE `yellow_cards` DISABLE KEYS */;
/*!40000 ALTER TABLE `yellow_cards` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-11 12:59:08
