<?php
include '../connect/connexion.php';
$matricule=$_POST["matricule"];
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$datenaissance=$_POST["datenaissance"];
$statut=$_POST["statut"];
$grade=$_POST["grade"];
$dateobtention=$_POST["dateobtention"];
$recepteuralerte=$_POST["recepteuralerte"];
$telfixe=$_POST["telfixe"];
$telportable=$_POST["telportable"];



if(!empty($_POST["matricule"]) AND !empty($_POST["nom"])AND !empty($_POST["prenom"])AND !empty($_POST["datenaissance"])AND !empty($_POST["statut"])AND !empty($_POST["grade"])AND !empty($_POST["dateobtention"])AND !empty($_POST["recepteuralerte"])AND !empty($_POST["telfixe"])AND !empty($_POST["telportable"]))
{
	$sql = "SELECT SP_MATRICULE FROM pompier WHERE SP_MATRICULE=".$matricule;
	$result = mysql_query($sql) or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".mysql_error()."<br /><br /><b>REQUETE SQL : </b>$sql<br />");
	$num_rows = mysql_num_rows($result);




	if($num_rows==0)
	{
		echo "Matricule déjà existant";
		include "modification.php";
	}
	else
	{
		$sql =" UPDATE pompier
				SET SP_NOM='$nom', SP_PRENOM='$prenom' , SP_DTE_NAISSANCE='$datenaissance', SP_TEL_FIXE='$telfixe', SP_TEL_PORTABLE='$telportable' , SP_BIP=$recepteuralerte, SP_STATUT='$statut', DATE_PROMOTION='$dateobtention', GRA_ID='$grade'
				WHERE SP_MATRICULE=$matricule
				";
				$result = mysql_query($sql) or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".mysql_error()."<br /><br /><b>REQUETE SQL : </b>$sql<br />");
		include ('page_CTA_personnel.php');
		echo "<h2><font color='red'>Modification effectuée</h2></font>";
		

	}

}else
{
	echo " <input type='hidden' value='<?php echo $nomcaserne; ?>' name='nomcaserne2'></input> ";
	include 'modification.php';
	echo "<center><h2><font color='red'>Merci de renseigner tous les champs</h2></font></center>";
}

?>
</html>