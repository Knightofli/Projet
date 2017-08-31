--
-- Table  forum_categorie 
--
CREATE TABLE Categories (
 cat_id  int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 cat_nom  varchar(30) NOT NULL, 
 cat_ordre  int(11) NOT NULL UNIQUE KEY
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Table  forum_forum  
--
CREATE TABLE Forum (
 forum_id  int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 forum_cat_id  mediumint(8) NOT NULL,
 forum_name  varchar(30) NOT NULL, 
 forum_desc  text NOT NULL, 
 forum_ordre  mediumint(8) NOT NULL,
 forum_last_post_id  int(11) NOT NULL,
 forum_topic  mediumint(8) NOT NULL,
 forum_post  mediumint(8) NOT NULL,
 auth_view  tinyint(4) NOT NULL,
 auth_post  tinyint(4) NOT NULL,
 auth_topic  tinyint(4) NOT NULL,
 auth_annonce  tinyint(4) NOT NULL,
 auth_modo  tinyint(4) NOT NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Table  forum_membres  
--
CREATE TABLE Membres (
 membre_id  int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 membre_pseudo  varchar(30) NOT NULL, 
 membre_password  text NOT NULL, 
 membre_mail  varchar(250) NOT NULL,
 membre_avatar  varchar(100) NOT NULL, 
 membre_signature  varchar(200) NOT NULL,
 membre_localisation  varchar(100) NOT NULL,
 membre_inscrit  int(11) NOT NULL, 
 membre_derniere_visite  int(11) NOT NULL, 
 membre_rang  tinyint (4) DEFAULT 2, 
 membre_post  int(11) NOT NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Table  forum_post  
--
CREATE TABLE Posts (
 post_id  int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
 post_createur  int(11) NOT NULL,
 post_texte  text NOT NULL,  
 post_time  int(11) NOT NULL, 
 topic_id  int(11) NOT NULL, 
 post_forum_id  int(11) NOT NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Table  forum_topic  
--
CREATE TABLE Topics (
 topic_id  int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 forum_id  int(11) NOT NULL,
 topic_titre  char(60) NOT NULL, 
 topic_createur  int(11) NOT NULL,
 topic_vu  mediumint(8) NOT NULL,
 topic_time  int(11) NOT NULL,
 topic_genre  varchar(30) NOT NULL, 
 topic_last_post  int(11) NOT NULL UNIQUE KEY,
 topic_first_post  int(11) NOT NULL,
 topic_post  mediumint(8) NOT NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;