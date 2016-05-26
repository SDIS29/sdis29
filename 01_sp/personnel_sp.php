<?php
// Connexion à la base de données
include '../connect/connexion.php';

// Inclusion de l'header
include '../includes/header.inc.php';

// Inclusion du menu
include '../includes/nav.inc.php';

?>

<!-- Fiche du sapeur pompier -->
<div id="content">
    <div id="left"> <span class="flt-lft"></span>
	
	
	<?php
	$sql = "SELECT LOGIN.SP_MATRICULE, SP_NOM, SP_PRENOM, SP_STATUT, GRA_LIBELLE, DATE_PROMOTION, SP_BIP, CIS_NOM,SP_DTE_NAISSANCE FROM LOGIN,POMPIER,grade,caserne WHERE pompier.GRA_ID=grade.GRA_ID AND login.SP_MATRICULE=pompier.SP_MATRICULE AND pompier.CIS_ID=caserne.CIS_ID AND LOG_LOGIN='".$profilLogin."'";
	$req = mysql_query($sql);
	$data = mysql_fetch_array($req);
	$d = strtotime($data[8]);
	$naissance = (int) ((time() - $d) / 3600 / 24 / 365.242);
	?>
	
	
    <?php 
	echo "<h2>".$data[1]."&nbsp &nbsp ".$data[2]."</h2>";
    echo "<br /><h3>Matricule : &nbsp &nbsp &nbsp &nbsp".$data[0]."</h3>";
	echo "<h3>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp".$data[7]."</h3>";
	echo "<h3>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp".$naissance." ans </h3><br/>";
	
	
    echo "<div style='width:300px;height:75px;border:2px solid #999999;'>";
	echo "<h3>&nbsp".$data[3]."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp".$data[4]."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp".$data[5]."</h3>";
	echo "</div>";
	echo "<br />";
	echo "<br /><h3>R&eacute;cepteur d'alerte : &nbsp &nbsp &nbsp &nbsp".$data[6]."</h3>";
	echo "<br /><br /><br />";
	
	
	?>
	
	
	<?php
	
	$sql = "SELECT LOG_PROFIL FROM LOGIN WHERE LOG_LOGIN='".$profilLogin."'";
	$req = mysql_query($sql);
	$reponse = mysql_fetch_array($req);
	

      if($reponse['LOG_PROFIL'] == 'SF')
        {
			echo '<form id="FORMULAIRE" action="../03_sf/page_formation.php" method="post">';
          echo '<input type="submit" id="formation" value="Formation"></input>';
        }
      
      if($reponse['LOG_PROFIL'] == 'SP')
        {
          echo '<form id="FORMULAIRE" action="../01_sp/Formulairetelephone.php" method="post">';
			echo "<input type='hidden' value='$data[0]' name='matricule'></input>";
        echo " <input type='submit' id='telephones' value='T&eacute;l&eacute;phones'></input> ";
        }
        
    ?>
    </div>


<!-- Fonctions occupées -->
<div id="right" style="padding-top:18px;">
<table border="1" width="275px">
<tr>
<td><center><h3>Fonctions occup&eacute;es</h3></center></td>
</tr>
</table>
<br />
<br />

<table border="1" width="275px">
<?php

$sql = "SELECT FCT_LIBELLE FROM fonction,exercer WHERE fonction.FCT_ID=exercer.FCT_ID AND SP_MATRICULE='".$data[0]."'";
$resultat = mysql_query($sql)
		or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".mysql_error()."<br /><br /><b>REQUETE SQL : </b>$sql<br />");

		while ($fonction = mysql_fetch_array($resultat, MYSQL_BOTH)) {
		echo "<tr>";
		echo "<td>";
		echo "<h4>".$fonction[0]."</h4>";
		echo "</td>";
		echo "</tr>";
		}
		
		

?>
</table>



</div>

<?php
// Inclusion du footer
include '../includes/footer.inc.php';
?>