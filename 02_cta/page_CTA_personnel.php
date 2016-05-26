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
  <br /><br /><br />
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
		<br /><br /><br /><br /><br /><br /><br /><br />
  </div>
  <div id="right">
    <div style="clear:both"></div>
   </div>

<?php
// Inclusion du footer
include '../includes/footer.inc.php';
?>
</div>
</body>
</html>
