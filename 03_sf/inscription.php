<?php
// Connexion à la base de données
include '../connect/connexion.php';

?>

<?php
$matricule=$_POST['matricule'];
$inscriptioncours=$_POST['inscriptioncours'];

$sql = 'SELECT SP_MATRICULE From inscrire 
where SP_MATRICULE='.$matricule.'
AND FOR_ID="'.$inscriptioncours.'"';

// on envoie la requête
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
$num_rows=mysql_num_rows($req);

	
  if ($num_rows==0){

 $sql = " INSERT INTO inscrire(SP_MATRICULE,FOR_ID)
            VALUES ('$matricule','$inscriptioncours')";
         
  $result = mysql_query($sql) or die ("La formation est déjà utiliser");
  echo "<input type='hidden' value='$matricule' id='matricule'></input>";
  include 'gestionformation.php';
  echo" <center><h2><font color='red'>Inscription réalisée </h2></font></center>";


  }
  
  else {
  echo "<input type='hidden' name='matricule' value='$matricule' id='matricule'></input>";
	include 'gestionformation.php';
  echo" <center><h2><font color='red'>Déjà inscrit dans cette formation </h2></font></center>";
  }
  ?>