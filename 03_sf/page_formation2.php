<?php

// Connexion à la base de données
include '../connect/connexion.php';

// Inclusion de l'header
include '../includes/header.inc.php';

// Inclusion du menu
include '../includes/nav.inc.php';


?>
<script type="text/javascript">
		function refresh() {
			var e = document.getElementById("caserne");
			var value = e.options[e.selectedIndex].value;
			document.location.href="page_CTA_personnel2.php?id_caserne="+value;
		}
</script>

  <div id="content">
<form id="formphp" action="page_CTA_personnel2.php" method="get">
	<fieldset>
		<legend>Liste des personnels</legend>
		<label for="Caserne" >CIS :</label>
		<?php
				
				$sql = "SELECT CIS_NOM FROM Caserne";
				$result = mysql_query($sql)
					or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".mysql_error()."<br /><br /><b>REQUETE SQL : </b>$sql<br />");
				$cpt=mysql_num_rows($result);

				if ($cpt>0) {
					echo "<select size=\"1\" name=\"caserne\" id=\"caserne\" onchange='refresh()'>";
					echo "<option value=\"#\" selected=\"selected\">Selectionner une caserne</option>";
					while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {

						echo "<option value='$row[0]'>$row[0]</option>";
					}
				} else {
					echo "<select size=\"1\" name=\"caserne\" id=\"caserne\" disabled=\"disabled\" >";
					echo "<option>Aucune information...</option>";
				}

				echo "</select>";
    	?>


	</fieldset>
	<?php
	if (isset($_GET['message']))
		echo $_GET['message'];
	else
		echo "&nbsp;";


	?>
</form>
<?php
    		
    		$caserne=$_GET['id_caserne'];
    	 	$sql='SELECT CIS_ID FROM caserne WHERE CIS_NOM="'.$caserne.'"';
    		$reponse = mysql_query($sql)or die ('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
    		$rows=mysql_fetch_array($reponse, MYSQL_BOTH);
    		$sql2="Select SP_NOM, SP_PRENOM , SP_MATRICULE FROM pompier WHERE CIS_ID=".$rows['CIS_ID'];
    		$reponse2= mysql_query($sql2) or die ('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
			$moipas=$rows['CIS_ID'];
       		?>
 <table id="affichetableau" border="1">
 
 <tr>
 <td ><h3> Nom du SP </h3></td>
 <td><h3>Prenom du SP </h3> </td>
 <td ><h3> Formation </h3> </td>
 </tr>

<?php

$cpt = 0;
while($donnees = mysql_fetch_array($reponse2, MYSQL_BOTH)){
	$cpt++;
	if ($cpt%2==0)
		echo "<tr class='even'>";
	else
		echo "<tr class='odd'>";

	echo "<td width=55%>".$donnees['0']."</td><td width=55%>".$donnees['1']

	."</td><td><form id='formation' action='gestionformation.php' method='POST'>
	<input type='hidden' value='".$donnees['2']."' name='matricule' id='matricule'>
	<input type='hidden' value='".$caserne."' name='caserne' id='caserne'>
	<input type='image' src='../images/working.png' width=20   name='matricule' ></form></td>";

	echo "</tr>";
 } ?>

</table>
<br /><br /><br />
<center><input type="button" id="Annuler" value="Retour" onclick="window.location.replace('../01_SP/personnel_sp.php')"></input></center>
</FORM>
  <div id="right">
    <div style="clear:both"></div>
   </div>
<?php
// Inclusion du footer
include '../includes/footer.inc.php';
?>
</div>
</div>
</body>
</html>