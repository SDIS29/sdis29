<?php

// Connexion à la base de données
include '../connect/connexion.php';

// Inclusion de l'header
include '../includes/header.inc.php';

// Inclusion du menu
include '../includes/nav.inc.php';


?>
<center>
    <table id="affichetableau" border="1">

            <tr>
                <td ><h3> Nom de la Recherche </h3></td>
                <td ><h3> Supprimer </h3></td>
                <td ><h3> Modifier </h3></td>
                <td ><h3> Rechercher </h3></td>
            </tr>

<?php

$sql2="Select * from recherche ";
$reponse2= mysql_query($sql2) or die ('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

$cpt = 0;
while($donnees = mysql_fetch_array($reponse2, MYSQL_BOTH)){
    $cpt++;

    echo "<td width=55%>".$donnees['NOMRECHERCHE']."</td>"

        ."</td><td><form id='suppression' action='' method='POST'>
	<input type='hidden' value='".$donnees['2']."' name='matricule' id='matricule'>
	<input type='image' src='../images/delete2.png' width=20   name='matricule' ></form></td>

	<td><form id='modification' action='' method='POST'>
	<input type='hidden' value='".$donnees['2']."' name='matricule' id='matricule'>
	<input type='image' src='../images/edit.png' width=20  name='matricule' ></form></td>

    <td><form id='Rechercher' action='resultat.php' method='POST'>
    <input type='hidden' value='".$donnees['3']."' name='caserne' id='caserne'>
    <input type='hidden' value='".$donnees['2']."' name='grade' id='grade'>
    <input type='submit'  name='Rechercher' value='Rechercher' ></form></td>";
    echo "</tr>";


} ?>

    </table>
    <br />
    <input type="button" id="Annuler" value="Nouvelle Recherche" ></input>

</center>
<?php
// Inclusion du footer
include '../includes/footer.inc.php';
?>
