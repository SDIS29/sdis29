<?php
// Connexion à la base de données
include '../connect/connexion.php';

?>


<?php
$matricule=$_POST['matricule'];
$desinscription=$_POST['desinscription'];

$sql = ' DELETE FROM inscrire WHERE SP_MATRICULE="'.$matricule.'" and FOR_ID="'.$desinscription.'"' ;
         
$result = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());


echo "<input type='hidden' value='$matricule' id='matricule'></input>";
include 'gestionformation.php';
echo" <center><h2><font color='red'>Desinscription  realisee.... </h2></font></center>";

?>