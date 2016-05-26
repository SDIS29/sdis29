
<?php
// Connexion à la base de données
include '../connect/connexion.php';

// Inclusion de l'header
include '../includes/header.inc.php';

// Inclusion du menu
include '../includes/nav.inc.php';

?>
<div id="content">
<br />
<?php
$matricule=$_POST['matricule'];

$sql = "SELECT SP_NOM, SP_PRENOM,SP_TEL_PORTABLE FROM pompier WHERE SP_MATRICULE =".$matricule;


$result=mysql_query($sql)

or die("Erreur SQL");


while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
	echo "<h3> Nom : " .$row[0]."<br />"." Prenom : ".$row[1]."</h3><br />"." <form id='Formulaire' action='ModificationTel.php' method='post'><h3>Entrez votre Numero de telephone :   &nbsp &nbsp &nbsp
																<input type='text' name='telephone' id='telephone'  size='10' maxlenght='8' placeholder='$row[2]'></h3></input><br />
																<input type='hidden' name='matricule' value='$matricule'></input>
																<br />";
																
	}

?>	

			<input type='submit' id='Envoyer' value=' Envoyer '></input>
			<input type='button' id='Annuler' value='Annuler' onclick="window.location.replace('personnel_sp.php')"></input>

		</form><br />

</div>
<?php
// Inclusion du footer
include '../includes/footer.inc.php';
?>