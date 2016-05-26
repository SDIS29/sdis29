<?php

// Connexion à la base de données
include '../connect/connexion.php';


// Inclusion de l'header
include '../includes/header.inc.php';

// Inclusion du menu
include '../includes/nav.inc.php';



?>



<?php

if(isset($_GET['id_formation']) AND $_GET['id_formation'] != NULL)
{
	$id_formation = $_GET['id_formation'];
	$sql1 = "SELECT * FROM FORMATION WHERE FOR_ID=$id_formation";
	$req1 = mysql_query($sql1) or die(mysql_error());
	$data1 = mysql_fetch_array($req1);
}
else
{
	header('Location: pf6.php');
}

$sql = "SELECT * FROM FORMATION";
$req = mysql_query($sql) or die(mysql_error());




?>
<script type="text/javascript">
	function refresh() {
		var e = document.getElementById("fonction")
		var value = e.options[e.selectedIndex].value;
		document.location.href="pf6_vue.php?id_formation="+value;
	}
</script>
<!-- Page PF71 -->
<div id="content">
    <div id="left"> <span class="flt-lft"></span>

	<h3>VALIDATION DES FORMATIONS</h3>

	<table cellspacing="15">
			<tr>
				<td>
					<label for="fonction">Fonction :</label>
        		</td>
				<td>
					<select name="fonction" id="fonction" onchange="refresh();">
						<option value="#" selected="selected">S&eacute;lectionnez une formation</option>
					<?php
						while($data = mysql_fetch_array($req))
						{
					?>
							<option value="<?php echo $data['FOR_ID']; ?>"><?php echo $data['FOR_LIBELLE']; ?></option>
					<?php
						}
					?>
					</select>
				</td>
			</tr>
		</table>

    </div>

    <div id="right" style="padding-top:18px;">
	    <h3><p align="center"><?php echo $data1['FOR_LIBELLE']; ?> <?php echo $data1['FOR_DESCRIPTION']; ?> du <?php echo date("d/m/Y", strtotime($data1['FOR_DTE_DEBUT'])); ?> au <?php echo date("d/m/Y", strtotime($data1['FOR_DTE_FIN'])); ?></p></h3>
	<h3><p align="center">Personnels Inscrits</p></h3>

		<form action="#" method="POST">

		<?php
				$sql = "SELECT pompier.SP_MATRICULE, SP_NOM, SP_PRENOM FROM pompier,inscrire,formation WHERE pompier.SP_MATRICULE = inscrire.SP_MATRICULE AND formation.FOR_ID = inscrire.FOR_ID AND formation.FOR_ID= '".$id_formation."'";
				$result = mysql_query($sql);
				$cpt=0;
					while ($row = mysql_fetch_array($result)) {

					// CSS pour une ligne sur deux
					$cpt++;
					if ($cpt%2==0)
						echo "<tr class=\"even\">";
					else
						echo "<tr class=\"odd\">";
					echo "<td width=\"15%\"><input type='checkbox' name='checkbox[]' id='checkbox' value='".$row['SP_MATRICULE']."'></td>";
					echo "<td width=\"15%\">".$row['SP_NOM']."</td>";
					echo "<td width=\"25%\">".$row['SP_PRENOM']."</td>";

					echo "<br />";
					echo "</tr>";
					}


					if(!empty($_POST['envoi_formation']))
					{
						if (empty($_POST['checkbox'])){
						$message = "<font color='red'>Erreur, selectionner un pompier</font>";
						}else{
						
						$value = $_POST['checkbox'];
						$nbValide = sizeof($value);
						$id = $_GET['id_formation'];
						$sql = "SELECT FCT_ID FROM formation WHERE FOR_ID = '".$id."'";
						$result = mysql_query($sql);
						$fonction = mysql_fetch_array($result);


						for ($i = 0; $i < $nbValide; $i++)
						{

							$sql = "INSERT INTO EXERCER VALUES ('$value[$i]', '$fonction[0]')";
							$result = mysql_query($sql) ;
							if ($result){
								$message = "<font color='green'>Insertion reussite</font>";
							}
							Else{
								$message = "<font color='red'>Erreur, pompier d&eacute;j&agrave; ins&eacute;r&eacute;</font>";
							}

							$sql = "INSERT INTO VALIDE VALUES('$value[$i]', '$id')";
							$result = mysql_query($sql);
							if ($result){
								$message = "<font color='green'>Insertion reussite</font>";
							}
							Else{
								$message = "<font color='red'>Erreur, pompier d&eacute;j&agrave; ins&eacute;r&eacute;</font>";
							}

						}
					}
				}
				?>
			</table>

		<p>
		<br/>
		<center>
				<input type="submit" name="envoi_formation" value="Valider la formation" />
				<input  type="button"  name="btnannul" value="Annuler" onclick="self.location.href='pf6.php'" />
			</form>
	    </center>
	    	</p>
		
			<p>
			<?php
			if (isset($message))
    			echo "<center>".$message."</center>";
    		?>
			</p>
    </div>
    <div style="clear:both"></div>


<?php
// Inclusion du footer
include '../includes/footer.inc.php';
?>

</div>
</body>
</html>