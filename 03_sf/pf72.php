<?php
// Connexion à la base de données
include '../connect/connexion.php';

// Inclusion de l'header
include '../includes/header.inc.php';

// Inclusion du menu
include '../includes/nav.inc.php';

?>

<?php
/**************************************/
/***			FORMULAIRE			***/
/**************************************/

// Vérification de l'envoi du formulaire

	if(!empty($_POST['identifiant']) &&
	   !empty($_POST['intitule']) &&
	   !empty($_POST['date_debut']) &&
	   !empty($_POST['date_fin']) &&
	   !empty($_POST['description']) &&
	   !empty($_POST['fonction']) 
	  )
	{
		// Tout est remplis, traitement des champs
		$identifiant = htmlentities($_POST['identifiant']);
		$intitule = htmlentities($_POST['intitule']);
		$date_debut = htmlentities($_POST['date_debut']);
		$date_fin = htmlentities($_POST['date_fin']);
		$description = htmlentities($_POST['description']);
		$fonction = htmlentities($_POST['fonction']);
		$capacite = htmlentities($_POST['capacite']);
		if($_POST['salle'])
		{
			$salle = htmlentities($_POST['salle']);
		}
		else
		{
			$salle = NULL;
		}
		$adresse = htmlentities($_POST['adresse']);
		$code_postal = htmlentities($_POST['code_postal']);
		$ville = htmlentities($_POST['ville']);

		// Vérification de l'existence de l'identifiant
		$sql = "SELECT FOR_ID FROM formation WHERE FOR_ID='$identifiant'";
		$req = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($req) == 0)
		{
			// Vérification du code postal (5 caractère maxi)
			if(strlen($code_postal) <= 5)
			{
				if($date_fin > $date_debut)
				{
					$sql = "INSERT INTO FORMATION VALUES('$identifiant', '$fonction', '$intitule', '$date_debut', '$date_fin', '$capacite', '$salle', '$adresse', '$code_postal', '$ville', '$description')";
					$req = mysql_query($sql) or die(mysql_error());

					if($req)
					{
						$message = 'La formation a bien &eacute;t&eacute; ajout&eacute;';
					}
					else
					{
						$message = 'Une erreur est survenue.';
					}
				}
				else
				{
					$message = 'La date de fin doit &ecirc;tre sup&eacute;rieure &agrave; la date de d&eacute;but';
				}
			}
			else
			{
				$message = 'Le code postal entr&eacute; n\'est pas valide.';
			}
		}
		else
		{
			$message = 'L\'identifiant est d&eacute;j&agrave; utilis&eacute;.';
		}
	}
	else
	{
		$message = 'Il manque un champs.';
	}



// Récupération des fonctions dans la BDD
$sql = "SELECT * FROM FONCTION";
$req = mysql_query($sql) or die(mysql_error());
?>
<!-- Page PF72 -->
<div id="content">

    <div id="left">
	    <span class="flt-lft"></span>

	    <?php if(isset($message)) { echo "<h3><center>".$message."</center></h3>"; } ?>

		<form action="#" method="POST">

		<h3>Description</h3>
		<table cellspacing="15">
			<tr>
				<td>
					<label for="identifiant">Identifiant :</label>
        		</td>
				<td>
					<input id="identifiant" name="identifiant" type="text" value=""/>
				</tr>
			<tr>
		        <td>
		        	<label for="intitule">Intitul&eacute; :</label>
		        </td>
		        <td>
		        	<input id="intitule" name="intitule" type="text" value=""/>
		        </td>
    		</tr>
    		<tr>
		        <td>
		        	<label for="date_debut">Date de d&eacute;but :</label>
		        </td>
		        <td>
		        	<input id="date_debut" name="date_debut" type="date" value=""/>
		        </td>
    		</tr>
    		<tr>
		        <td>
		        	<label for="date_fin">Date de fin :</label>
		        </td>
		        <td>
		        	<input id="date_fin" name="date_fin" type="date" value=""/>
		        </td>
    		</tr>
    		<tr>
		        <td>
		        	<label for="description">Description :</label>
		        </td>
		        <td>
		        	<input id="description" name="description" type="text" value=""/>
		        </td>
    		</tr>
		</table>

		<br />

		<h3>Fonctions</h3>
		<table cellspacing="15">
			<tr>
				<td>
					<label for="fonction">Fonction :</label>
        		</td>
				<td>
					<select name="fonction" id="fonction">
					<?php
						while($data = mysql_fetch_array($req))
						{
					?>
							<option value="<?php echo $data['FCT_ID']; ?>"><?php echo $data['FCT_LIBELLE']; ?></option>
					<?php
						}
					?>
					</select>
				</td>
			</tr>
			<tr>
		        <td>
		        	&nbsp;
		        </td>
			<td>
				<input name="envoi_pf72" type="submit" value="Valider"></input> <input type="button" value="Annuler" onclick="window.location.replace('pf71.php')"></input>
        	</td>
    		</tr>
		</table>
    </div>

    <div id="right" style="padding-top:18px;">

	<h3>Infos pratiques</h3>
		<table cellspacing="15">
			<tr>
				<td>
					<label for="capacite">Capacit&eacute; :</label>
        		</td>
				<td>
					<input id="capacite" name="capacite" type="number" value=""/>
				</tr>
			<tr>
		        <td>
		        	<label for="salle">Salle :</label>
		        </td>
		        <td>
		        	<input id="salle" name="salle" type="text" value=""/>
		        </td>
    		</tr>
    		<tr>
		        <td>
		        	<label for="adresse">Adresse :</label>
		        </td>
		        <td>
		        	<input id="adresse" name="adresse" type="text" value=""/>
		        </td>
    		</tr>
    		<tr>
		        <td>
		        	<label for="code_postal">Code postal :</label>
		        </td>
		        <td>
		        	<input id="code_postal" name="code_postal" type="text" value=""/>
		        </td>
    		</tr>
    		<tr>
		        <td>
		        	<label for="ville">Ville :</label>
		        </td>
		        <td>
		        	<input id="ville" name="ville" type="text" value=""/>
		        </td>
    		</tr>
    	</table>
		</form>
    </div>

    <div style="clear:both"></div>


<?php
// Inclusion du footer
include '../includes/footer.inc.php';
?>
</div>
</body>
</html>


