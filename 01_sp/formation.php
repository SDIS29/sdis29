<?php
// Inclusion de l'header
include '../includes/header.inc.php';

// Connexion à la base de données
include '../connect/connexion.php';

// Inclusion du menu
include '../includes/nav.inc.php';
?>

<div id="content">
<br />
    <?php
	$sql = "SELECT LOGIN.SP_MATRICULE, SP_NOM, SP_PRENOM FROM POMPIER, LOGIN WHERE LOGIN.SP_MATRICULE=pompier.SP_MATRICULE AND LOG_LOGIN='".$profilLogin."'";
	$req = mysql_query($sql);
	$data = mysql_fetch_array($req);
	?>
	
	
    <?php 
	echo "<center><h2>".$data[1]."&nbsp  ".$data[2]."</h2></center><br/>";
	
	
	$sql = "SELECT formation.FOR_ID, FOR_LIBELLE, FOR_DTE_DEBUT, FOR_DTE_FIN, FOR_SALLE, FOR_ADRESSE, FOR_CP, FOR_VILLE FROM formation,inscrire WHERE formation.FOR_ID=inscrire.FOR_ID AND SP_MATRICULE='".$data[0]."' ORDER BY FOR_DTE_DEBUT";
	$resultat = mysql_query($sql)
		or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".mysql_error()."<br /><br /><b>REQUETE SQL : </b>$sql<br />");
			
			
		while ($fonction = mysql_fetch_array($resultat, MYSQL_BOTH)) {
		
		echo "<center><div style='width:450px;height:275px;border:2px solid #999999;'>";
		
		echo "<h4>".$fonction[0]."&nbsp ".$fonction[1]."</h4><br /><br />";
		echo "<div id='right' style='padding-left:100px;'>";
		echo "<table border='1'>";
		
		echo "<tr>";
		echo "<td>";

		if ( abs(  strtotime ($fonction[3]) - strtotime ($fonction[2]) )> 1 ){
		echo "<h4> Du  ".$fonction[2]." au ".$fonction[3]."</h4>";
		}else{
		echo "<h4> Le ".$fonction[2]."</h4>";
		}
		echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>";
		echo "<h4>".$fonction[4]."</h4>";
		echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>";
		echo "<h4> ".$fonction[5]."</h4>";
		echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>";
		echo "<h4>".$fonction[6]." &nbsp".$fonction[7]."</h4>";
		echo "</td>";
		echo "</tr>";
		
		
		echo "</table>";
		echo "</div>";
		
		
		
		
		echo "</div> </center>";
		echo "<br />";
		}
	
   
	
	

	
	?>
	<center><input  type="button"  name="btnannul" value="Annuler" onclick="self.location.href='../statut.php'" /></center>
</div>

<?php
// Inclusion du footer
include '../includes/footer.inc.php';

?>