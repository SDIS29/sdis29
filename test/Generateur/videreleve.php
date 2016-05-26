<?php
	include 'connect.php';

    $sql="TRUNCATE TABLE eleve";
	$result = mysql_query($sql)
 		or die ("Requete invalide");
 	echo "Table classe vid&eacute;e";
?>
