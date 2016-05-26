<html>
<?php
// Connexion à la base de données
include '../connect/connexion.php';

// Inclusion de l'header
include '../includes/header.inc.php';

// Inclusion du menu
include '../includes/nav.inc.php';

?>
<head>
<style>
	#desinscrire {
	display:none;
}
</style>


<script type="text/javascript">

function inscrire() {
	if ( document.getElementById('inscrire').checked == true) {
		document.getElementById('desinscrire').style.display = "none";
		document.getElementById('inscription').style.display = "block";
	}else if ( document.getElementById('supprimerinscription').checked == true){
		document.getElementById('inscription').style.display = "none";
		document.getElementById('desinscrire').style.display = "block";
	}
}
</script>

</head>

<body>
<div id="content">

<?php
	$caserne=$_POST['caserne'];
	$matricule=$_POST['matricule'];
	$sql = "SELECT SP_NOM, SP_PRENOM,SP_TEL_PORTABLE FROM pompier WHERE SP_MATRICULE =".$matricule;

	//execute la requete sql
	$result=mysql_query($sql)
	//ou s'arrette
	or die("Erreur SQL");
	

	$sql = " Select SP_MATRICULE from pompier where SP_MATRICULE=".$matricule;
	$result = mysql_query($sql) or die ('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
	$num_rows = mysql_num_rows($result);
	


	if ($num_rows==0)
	{
		include 'index.php';
		echo " <font color='red'>Matricule invalide </font> ";

	}

	if ($num_rows==1){

		$sql="SELECT SP_NOM, SP_PRENOM FROM pompier WHERE SP_MATRICULE =".$matricule;
		$result=mysql_query($sql) or die ('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
		$row = mysql_fetch_array($result, MYSQL_NUM);
		echo "<br /> <h3>Nom : " .$row[0]."<br /><br />"." Prenom: ".$row[1]."</h3><br />";
		?>

		



<fieldset>
<h3>
<INPUT type='radio' name='inscrire' value='inscrire' checked='checked' onClick='inscrire()' id='inscrire'  >Inscrire
<br/>
<br/>
<Input type='radio' name='inscrire' value='supprimerinscription' onClick='inscrire()' id='supprimerinscription'>Supprimer l'inscription
</h3>
</fieldset>	

<div id="inscription">
</br>
</br>
<?php 
$sql = " Select FOR_ID from formation WHERE FOR_ID NOT IN(SELECT FOR_ID from inscrire WHERE SP_MATRICULE='".$matricule."')";
         
$result = mysql_query($sql) or die ('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

$nombrelignes = mysql_num_rows($result);


echo"<form id='FORMULAIRE' action='inscription.php' method='post'>";
echo" <h3> Formation : &nbsp &nbsp";
echo"<select name='inscriptioncours' id='inscriptioncours'></h3>";


while ($row=mysql_fetch_array($result)){


 



?> 
<option value="<?php echo $row['FOR_ID']; ?>"> <?php echo $row['FOR_ID']; ?> </option>

<?php 

} 
echo '<select/>';
echo ' </br>';
echo ' </br>';

echo "<input type='hidden' value='$matricule' name='matricule'></input>";
echo "<input type='hidden' value='$caserne' name='caserne'></input>";

<br />


<input type="submit" id="Envoyer" value=" Valider "></input>
<input type="button" id="Annuler" value="Annuler" onclick="window.location.replace('page_formation2.php?id_caserne=<?php echo $caserne?>')"></input>

</form>
</div>
	
	
<div id="desinscrire">
</br>
</br>
<?php 
$sql = " Select FOR_ID from inscrire
		  WHERE SP_MATRICULE=".$matricule;
         
$result = mysql_query($sql) or die ('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

$nombrelignes = mysql_num_rows($result);
echo"<form id='FORMULAIRE2' action='desinscrire.php' method='post'>";
echo"<h3>Formation : &nbsp &nbsp";
echo"<select name='desinscription' id='desinscription'></h3>";
while ($row=mysql_fetch_array($result)){


?> 
<option value="<?php echo $row['FOR_ID']; ?>"> <?php echo $row['FOR_ID']; ?> </option>

<?php 
} 
echo '<select/>';
echo ' </br>';
echo ' </br>';

echo "<input type='hidden' value='$matricule' name='matricule'></input>";
echo "<input type='hidden' value='$caserne' name='caserne'></input>";
?>

<br />

<input type="submit" id="Envoyer" value=" Valider "></input>
<input type="button" id="Annuler" value="Annuler"  onclick="window.location.replace('../01_SP/personnel_sp.php')"></input>

</form>
</div>




	

<?php 
}
 else
 { 
 	
 	include 'Index.php';
 	echo " <font color='red'>Merci de remplir le champs <font/>";
}

?>


<?php
// Inclusion du footer
include '../includes/footer.inc.php';
?>


</div>
</body>
</html>

