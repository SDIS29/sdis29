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
            <td ><h3> Matricule </h3></td>
            <td ><h3> SP_NOM </h3></td>
            <td ><h3> SP_PRENOM </h3></td>
        </tr>


<?php
$caserne=$_POST['caserne'];
$grade=$_POST['grade']
?>

<?php
$sql2="Select SP_MATRICULE, SP_NOM, SP_PRENOM from pompier,grade,caserne where pompier.GRA_ID=grade.GRA_ID and pompier.CIS_ID=caserne.CIS_ID and GRA_LIBELLE='".$grade."' and CIS_NOM='".$caserne."'";
$reponse2= mysql_query($sql2) or die ('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

$cpt = 0;
while($donnees = mysql_fetch_array($reponse2, MYSQL_BOTH)) {
    $cpt++;

    echo "<tr>";
    echo "<td width=55%>" . $donnees['SP_MATRICULE'] . "</td>";
    echo "<td width=55%>" . $donnees['SP_NOM'] . "</td>";
    echo "<td width=55%>" . $donnees['SP_PRENOM'] . "</td>";
    echo "</tr>";
}

?>
        </table>
    <br />
    <br />
    <input type="button" id="Annuler" value="Revenir ecran Recherche" onclick="window.location.replace('recherche.php')"></input>
        </center>


<?php
// Inclusion du footer
include '../includes/footer.inc.php';
?>
