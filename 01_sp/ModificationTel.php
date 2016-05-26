<?php
// Connexion à la base de données
include '../connect/connexion.php';

?>


<?php
$tel=$_POST['telephone'];
$matricule=$_POST['matricule'];

if (!empty($_POST['telephone']))
{


$sql = "UPDATE pompier
        SET SP_TEL_PORTABLE='$tel'
		WHERE SP_MATRICULE=$matricule ";
		
$result=mysql_query($sql) or die ("Erreur sql");


include "Formulairetelephone.php";
echo "<center><h2><font color='red'>Modification effectuee</h2></font></center>";


}
else {

include 'Formulairetelephone.php ';
echo "<center><h2><font color='red'>Merci de renseigner tous les champs</h2></font></center>";

}
