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
$caserne=$_POST["caserne"];



if(!empty($_POST["matricule"]) AND !empty($_POST["nom"])AND !empty($_POST["prenom"])AND !empty($_POST["datenaissance"])AND !empty($_POST["statut"])AND !empty($_POST["grade"])AND !empty($_POST["dateobtention"])AND !empty($_POST["recepteuralerte"])AND !empty($_POST["telfixe"])AND !empty($_POST["telportable"]))
{
	$sql = "SELECT SP_MATRICULE FROM pompier WHERE SP_MATRICULE=".$matricule;
	$result = mysql_query($sql) or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".mysql_error()."<br /><br /><b>REQUETE SQL : </b>$sql<br />");
	$num_rows = mysql_num_rows($result);
	
	
	
	
	if($num_rows==0)
	{
		$grade_id='SELECT GRA_ID FROM grade WHERE GRA_LIBELLE="'.$grade.'"';
		$result = mysql_query($grade_id);
		

		$sql ="INSERT INTO pompier (SP_MATRICULE, SP_NOM, SP_PRENOM, SP_DTE_NAISSANCE, SP_TEL_FIXE, SP_TEL_PORTABLE, SP_BIP, SP_STATUT, DATE_PROMOTION,  GRA_ID, CIS_ID)
			   VALUES ( '$matricule' ,'$nom','$prenom', '$datenaissance', '$telfixe', '$telportable', $recepteuralerte,'$statut', '$dateobtention', $grade, $caserne)";
			  $result = mysql_query($sql) or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".mysql_error()."<br /><br /><b>REQUETE SQL : </b>$sql<br />"); 
		
		include "page_CTA_personnel.php";
		echo "<h2><font color='red'>Pompier ajoutée</font></h2> ";
	}
	else
	{
		include "inscription2.php";
		echo"Matricule deja utilise";
		
	}
	
}else
{
	
	include ('inscription.php');
	echo "<center><h2><font color='red'>Merci de renseigner tous les champs</h2></font></center>";
}

?>