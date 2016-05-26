<?php
	include 'connect.php';

    //les classes sont dans le fichier classe.txt
	$nomfichier = 'classe.txt';
	$tabloclasses = file($nomfichier);
	// tant que $i est inferieur au nombre d'éléments du tableau...
	for($i=0;$i<sizeof($tabloclasses);$i++) {
    	$sql="INSERT INTO classe(idclasse,intitule) VALUES (NULL,'".$tabloclasses[$i]."')";
    	echo "Sql : ".$sql."<br />";
		$result = mysql_query($sql)
 			or die ("Requete invalide");
    }

?>

