<?php
include '../connect/connexion.php';
$matricule=$_POST['matricule'];
$sql =" Delete from pompier where SP_MATRICULE='".$matricule."'";
$result = mysql_query($sql) or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".mysql_error()."<br /><br /><b>REQUETE SQL : </b>$sql<br />");
include "page_CTA_personnel.php";
echo "<h2><font color='red'>Suppression effectuee</h2></font>";
?>