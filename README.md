# g-liens
Gestionnaire perso de liens

#Base de donnée

##Creation des tables

CREATE TABLE IF NOT EXISTS `categorie` (<br>
  `ID` int(11) NOT NULL AUTO_INCREMENT,<br>
  `nom` text NOT NULL,<br>
  `img` text NOT NULL,<br>
  PRIMARY KEY (`ID`)<br>
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;<br>


CREATE TABLE IF NOT EXISTS `lien` (<br>
  `ID` int(11) NOT NULL AUTO_INCREMENT,<br>
  `titre` text NOT NULL,<br>
  `lien` text NOT NULL,<br>
  `description` text NOT NULL,<br>
  `categorie` int(11) NOT NULL,<br>
  PRIMARY KEY (`ID`)<br>
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;<br>

##Explication des tables 

###Catégorie :<br>
ID : Identifiant de la catégorie (automatique)<br>
nom : Nom de la catégorie<br>
img : Nom de l'image (les icones doivent etre posé dans /img/ico/)<br>

###Lien :
ID : Identifiant du lien<br>
titre : Titre du lien<br>
lien : Url du lien<br>
description : Description du lien<br>
categorie : Identificant de la catégorie<br>

#Architecture Serveur WEB

lien.php : page d'affichage des liens<br>
ajout.php : page d'ajout de lien<br>
config.php : Fichier configuration accès à la base de donnée
style.css : fichier CSS à poser dans ./css/

/css/ : dossier des style CSS (NB: y déposer le fichier style.css)
/img/ : dossier d'image (logos...)<br>
/img/ico/ : icones pour les catégorie<br>

V1.1 : Ajout de la récupération automatique des favicones, correction bug base de donnée  
