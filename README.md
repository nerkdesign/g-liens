# g-liens
Gestionnaire perso de liens

#Base de donnée

##Creation des tables

CREATE TABLE IF NOT EXISTS `categorie` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;


CREATE TABLE IF NOT EXISTS `lien` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `lien` text NOT NULL,
  `description` text NOT NULL,
  `categorie` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

##Explication des tables 

###Catégorie :
ID : Identifiant de la catégorie (automatique)
nom : Nom de la catégorie
img : Nom de l'image (les icones doivent etre posé dans /img/ico/)

###Lien :
ID : Identifiant du lien
titre : Titre du lien
lien : Url du lien
description : Description du lien
categorie : Identificant de la catégorie

#Architecture Serveur WEB

lien.php : page d'affichage des liens
ajout.php : page d'ajout de lien

/img/ : dossier d'image (logos...)
/img/ico/ : icones pour les catégorie
