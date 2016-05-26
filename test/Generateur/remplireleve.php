<?php
	include 'connect.php';

    //les noms sont dans le fichier nom.txt
	$nomfichier = 'nom.txt';
	$tablonomfamille = file($nomfichier);
	//les prenoms garcon sont dans le fichier garcon.txt
	$nomfichier = 'garcon.txt';
	$tabloprenomgarcon = file($nomfichier);
	//les prenoms garcon sont dans le fichier garcon.txt
	$nomfichier = 'fille.txt';
	$tabloprenomfille = file($nomfichier);

     print_r($tablonomfamille);

	// tant que $i est inferieur au nombre d'éléments du tableau...
	/*for($i=0;$i<sizeof($tabloclasses);$i++) {
    	$sql="INSERT INTO classe(idclasse,intitule) VALUES (NULL,'".$tabloclasses[$i]."')";
    	echo "Sql : ".$sql."<br />";
		$result = mysql_query($sql)
 			or die ("Requete invalide");



 			INSERT INTO eleve(ideleve,nom,prenom,numclasse,datenaissance) VALUES (NULL ,'jkhjk','jkhjkh','12','2011-10-20')


    }                                  */

?>

