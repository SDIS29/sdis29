<?php
// Connexion à la base de données
include '../connect/connexion.php';

// Vérification de l'existence de l'identifiant
$sql = "SELECT FOR_ID FROM formation WHERE FOR_ID='". $_GET['id'] ."'";
$req = mysql_query($sql) or die(mysql_error());

if($_GET['id'])
{
	if(mysql_num_rows($req) == 0)
	{
		header('Location: pf71.php');
		die();
	}
	else
	{
		$identifiant = $_GET['id'];
	}
}
else
{
	header('Location: pf71.php');
	die();
}

$sql = "DELETE FROM formation WHERE FOR_ID='$identifiant'";
$req = mysql_query($sql);

if($req)
{
	header('Location: pf71.php');
	die();
}
else
{
	include ('pf71.php');
	echo '<font color=red><center><h3>Veuillez supprimer tout les adherants a la formation avant de supprimer la formation </center></h3></font> ';
}
?>
