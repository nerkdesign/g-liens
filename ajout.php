<?php require('config.php'); ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>
<link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>

<title>Ajouter un lien.</title>
<?php
        $OK = isset($_POST['OK']) ? $_POST['OK'] : '';
        if (isset($OK))
        {
        $choix=$_POST['categorie'];
        $titre=$_POST['titre'];
        $url=$_POST['url'];
        $description=$_POST['description'];
        echo "</center>";
        $query = "INSERT INTO lien(ID,titre,lien,description,categorie) VALUES( NULL,'".$titre."','".$url."','".$description."','".$choix."')";
        $quo = mysql_query($query) or exit(mysql_error());
        }
?>
</head>
<body>
<center>
<div style="border: solid 2px">

<form action="ajout.php" method="post">
<br><img src="./img/ico/link.png"><br><br>
Titre :<input type="text" name="titre" /><br><br>
Url :<input type="text" name="url" /><br><br>
Description :<input type="text" name="description" /><br><br>
Cat&eacute;gorie :<select name="categorie">

<?

$sql = "SELECT * FROM categorie";
$res = mysql_query($sql) or exit(mysql_error());
while($data=mysql_fetch_array($res)) {
   echo '<option value="'.$data['ID'].'">'.$data["nom"].'</option><br/>';
}

mysql_close();
?>
<br><input type="submit" value="valider" name="OK">
   </select>
</form>
</div>
<br>
<br>Outils d'aide &agrave; la saisie<br>
Entrez l'url distante pour r&eacute;cuperer automatiquement les informations propres au site<br><br>
<?php
//Reperation en curl
function file_get_contents_curl($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}
?>
<center>
<div style="border: solid 2px">
<br>
<?php $actu=$_SERVER['PHP_SELF']; ?>
<form action="<?php echo $actu; ?>" method="post">
Url :<input type="text" name="urldecode" /><br><br>
<br><input type="submit" value="valider" name="OK">
   </select>
</form>
<?php
//Pour les accents
$urldecode=$_POST['urldecode'];
$html = file_get_contents_curl($urldecode);


$doc = new DOMDocument();
@$doc->loadHTML($html);
$nodes = $doc->getElementsByTagName('title');

$title = $nodes->item(0)->nodeValue;

$metas = $doc->getElementsByTagName('meta');

for ($i = 0; $i < $metas->length; $i++)
{
    $meta = $metas->item($i);
    if($meta->getAttribute('name') == 'description')
        $description = $meta->getAttribute('content');
    if($meta->getAttribute('name') == 'keywords')
        $keywords = $meta->getAttribute('content');
}

$title = utf8_decode($title);
$description = utf8_decode($description);
$keywords = utf8_decode($keywords);

echo "Title: $title". '<br/><br/>';
echo "Description: $description". '<br/><br/>';
echo "Keywords: $keywords";
echo "</div>";
?>
