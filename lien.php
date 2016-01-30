<?php
require ('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>G-Liens</title>

        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>

<div id="outer-container">
    <div id="header">
        <center><h1><img src="./img/logo.jpg" width=150></h1></center>
    </div>
    <div style="clear: both">
    </div>

    <div id="top-Nav">
        <center>

        <FORM METHOD=POST ACTION="lien.php">

        <div id="titre4">
                <img src="./img/ico/search.png" width=25px><input type="text" name="recherche" />
                <INPUT type="submit" value="Rechercher" style="position:relative;left:10">
                </FORM>
                <?php
                $recherche = mysql_real_escape_string($_POST['recherche']);
                if ($recherche!='')
                {
                $recherche=strip_tags( $recherche );
                $requete="SELECT * FROM lien WHERE description LIKE '%$recherche%'";
                $resultat=mysql_query($requete);
                echo '<br>Resultat de la recherche :<br>';

                while($array2 = mysql_fetch_array($resultat)){
                echo '<br><a href="./lien.php?id='.$array2['ID'].'">'.$array2['titre'].'</a>';
                }
                }
                echo '<br></div>';

                ?>
        </center>
    </div>
    <div style="clear: both"><br>
    </div>

    <div id="left-nav">
<?php
$sql = 'SELECT * FROM categorie ORDER BY nom ASC';
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

while ($data = mysql_fetch_array($req)) {
        $sqlnb = "SELECT * FROM `lien` WHERE categorie =".$data['ID'];
        $reqnb = mysql_query($sqlnb) or die('Erreur SQL !<br />'.$sqlnb.'<br />'.mysql_error());
        $nb = mysql_num_rows($reqnb);
        echo '<a href="./lien.php?cat='.$data['ID'].'"><img src="./img/ico/'.$data['img'].'" width=25>'.$data['nom'].' ('.$nb.')<br />';
}
mysql_free_result ($req);
mysql_close ();
?>
    </div>
    <div id="content-container">
        <?php
        //CAS POUR UN RESULTAT DE RECHERCHE
        $id1 = $_GET['id'];
         if ($id1!='')
        {
                $sql2 = "SELECT * FROM `lien` WHERE ID =".$id1;
                $req2 = mysql_query($sql2) or die('Erreur SQL !<br />'.$sql2.'<br />'.mysql_error());
                while ($data2 = mysql_fetch_array($req2)) {
                        echo '<a href="'.$data2['lien'].'" target="_blank" >'.$data2['titre'].'</a><br>'.$data2['description'].'<br><br>';
                }
        }
        //CAS POUR CATEGORIE
        $cat = $_GET['cat'];
         if ($cat!='')
        {
                include ('config.php');
                $sql3 = "SELECT * FROM `lien` WHERE categorie =".$cat;
                $req3 = mysql_query($sql3) or die('Erreur SQL !<br />'.$sql3.'<br />'.mysql_error());
                while ($data3 = mysql_fetch_array($req3)) {
                        echo '<img src="http://www.google.com/s2/favicons?domain='.$data3['lien'].'" /><a href="'.$data3['lien'].'" target="_blank" >'.$data3['titre'].'</a><br>'.$data3['description'].'<br><br>';
                }
        }
//END

?>
    </div>
    <div style="clear: both">
    </div>

    <div id="footer">
        <center><a href="http://www.nerkdesign.com" target="_blank">Nerkdesign </a> 2015 &copy;</center>
    </div>
</div>
