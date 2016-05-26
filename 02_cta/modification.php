<?php

// Connexion à la base de données
include '../connect/connexion.php';

// Inclusion de l'header
include '../includes/header.inc.php';

// Inclusion du menu
include '../includes/nav.inc.php';


?> 
<?php
$matricule=$_POST['matricule'];
$nomcaserne=$_POST['nomcaserne2'];
$requete=mysql_query("SELECT SP_NOM, SP_PRENOM, SP_DTE_NAISSANCE, SP_STATUT, GRA_ID, DATE_PROMOTION, SP_BIP, SP_TEL_FIXE, SP_TEL_PORTABLE FROM pompier WHERE SP_MATRICULE='".$matricule."'");

while ($row = mysql_fetch_array($requete, MYSQL_BOTH)){

$nom=$row[0];
$prenom=$row[1];
$dteN=$row[2];
$statut=$row[3];
$grade=$row[4];
$dtepromotion=$row[5];
$bip=$row[6];
$telfixe=$row[7];
$telportable=$row[8];
						
						}

?>
  <div id="content">
<form action="modification2.php" method="post">
<fieldset>
 <legend>Personnels</legend>
 <br />
 <table>
    <tr>
        <td><label for="nom">Nom :        </label></td>
        <td><input type="text" id="nom" name="nom" value="<?php echo $nom ?>"/></td>
      </tr>
    <tr>
       <td> <label for="prenom">Prenom :   </label></td>
        <td><input type="text" id="prenom" name="prenom"  value="<?php echo $prenom ?>"/></td>
    <tr/>
    <tr>
        <td><label for="Date de naissance">Date de naissance :</label></td>
        <td><input type="text" id="datenaissance" name="datenaissance"  value="<?php echo $dteN ?>"/></td>
    </tr>
    <tr>
    <TD>Statut:</TD>
         <TD> <select id="Statut" name="statut">
                <option value="volontaire" name="Volontaire"  <?php echo(("volontaire"== $statut) ? " selected=\"selected\"" : null); ?> >
				Pompier Volontaire</option>
				<option value="professionel" name="Professionnel"<?php echo(("professionel"== $statut) ? " selected=\"selected\"" : null); ?> >
				Pompier Professionel</option>
				</select>
</TD>
</tr>
<TR>

     <TD> Grade:  </TD>
        <td>
		<select id="Grade" name="grade" >
   <?php
				$sql = "SELECT GRA_ID, GRA_LIBELLE from grade";
				$result = mysql_query($sql)
					or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".mysql_error()."<br /><br /><b>REQUETE SQL : </b>$sql<br />");
				$cpt=mysql_num_rows($result);

				if ($cpt>0) {
					while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {

						echo "<option value='".$row[0]."'";
						if ($row[0] == $grade) echo " selected" ;
						echo ">".$row[1]."</option>";
					}
				} 
				

				echo "</select>";
    	?>
		</select>
</td>
</TR>

    <TR>
      <TD><label for="dateobtention">Date d'obtention :</label></TD>
      <TD> <input type="text" id="dateobtention" name="dateobtention"   value="<?php echo $dtepromotion ?>" /></TD>
    </TR>
      <TR>
    <TD><label for="recepteuralerte">Récepteur d'alerte :</label></TD>
     <TD>   <input type="text" id="recepteuralerte" name="recepteuralerte"  value="<?php echo $bip ?>" /></TD>
   <TR/>
    <TR>
    <TD>    <label for="telfixe">Téléphone fixe :</label></TD>
    <TD>    <input type="text" id="telfixe" name="telfixe"  value="<?php echo $telfixe ?>"/></TD>
    <TR />

      <TR>
        <TD><label for="telportable">Téléphone portable:</label></TD>
        <td><input type="text" id="telportable" name="telportable"  value="<?php echo $telportable ?>"/></td>
    </TR>
      </table>

</fieldset>
<br />
<br />
<center>
<table>
<tr>
<input type='hidden' value='<?php echo $matricule; ?>' name='matricule'></input>
<input type='hidden' value='<?php echo $nomcaserne; ?>' name='nomcaserne2'></input>

<td><INPUT TYPE="submit" NAME="envoi" VALUE=" Valider "></td>
<td><input type="button" id="Annuler" value="Annuler" onclick="window.location.replace('page_CTA_personnel2.php?id_caserne=<?php echo $nomcaserne ?>')"></input></td>

</tr>
</table>
</center>
</form>

<?php

// Inclusion du footer
include '../includes/footer.inc.php';
?>
  </div>
</body>
</html>
