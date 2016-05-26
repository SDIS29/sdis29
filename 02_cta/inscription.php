<?php

// Connexion à la base de données
include '../connect/connexion.php';

// Inclusion de l'header
include '../includes/header.inc.php';

// Inclusion du menu
include '../includes/nav.inc.php';


?>
<?php
$caserne=$_POST['caserne'];
$nomcaserne=$_POST['nomcaserne'];

?>
  <div id="content">
<form action="inscription2.php" method="post">
<fieldset>
 <legend>Personnels</legend>
 <br />
 <table>
    <tr>
    <td>   <label for="matricule">Matricule :</label></td>
    <td>  <input type="text" id="matricule" name="matricule" /> </td>

    </tr>
    <tr>
        <td><label for="nom">Nom :        </label></td>
        <td><input type="text" id="nom" name="nom" /></td>
      </tr>
    <tr>
       <td> <label for="prenom">Prenom :   </label></td>
        <td><input type="text" id="prenom" name="prenom" /></td>
    <tr/>
    <tr>
        <td><label for="Date de naissance">Date de naissance :</label></td>
        <td><input type="text" id="datenaissance" name="datenaissance" placeholder='AAAA-MM-JJ'/></td>
    </tr>
    <tr>
    <TD>Statut:</TD>
         <TD> <select id="Statut" name="statut">
   <option value="volontaire" name="Volontaire" >Pompier Volontaire</option>
   <option value="professionel" name="Professionnel">Pompier Professionel</option>


</select>
</TD>
</tr>
<TR>

     <TD> Grade:  </TD>
        <td> <select id="Grade" name="grade" >
   <option value="3">Caporal-Chef</option>
   <option value="10">Capitaine</option>
   <option value="11">Commandant</option>
   <option value="1">Sapeur 1ère classe</option>
   <option value="12">Lieutenan-Colonel</option>
   <option value="13">Colonel</option>
   <option value="2">Caporal </option>
   <option value="3">Caporal-chef</option>
   <option value="4">Sergent</option>
   <option value="5">Sergent-Chef</option>
   <option value="6">Adjudant</option>
   <option value="8">Major</option>
   <option value="9">Lieutenant</option>
   <option value="7">Adjudant-Chef</option>
</select>
</td>
</TR>

    <TR>
      <TD><label for="dateobtention">Date d'obtention :</label></TD>
      <TD> <input type="text" id="dateobtention" name="dateobtention"  placeholder='AAAA-MM-JJ' /></TD>
    </TR>
      <TR>
    <TD><label for="recepteuralerte">Récepteur d'alerte :</label></TD>
     <TD>   <input type="text" id="recepteuralerte" name="recepteuralerte" /></TD>
   <TR/>
    <TR>
    <TD>    <label for="telfixe">Téléphone fixe :</label></TD>
    <TD>    <input type="text" id="telfixe" name="telfixe" /></TD>
    <TR />

      <TR>
        <TD><label for="telportable">Téléphone portable:</label></TD>
        <td><input type="text" id="telportable" name="telportable" /></td>
    </TR>
      </table>

</fieldset>
<br />
<br />
<center>
<table>
<tr>
<?php
echo "<input type='hidden' value='$caserne' name='caserne'>";
echo "<input type='hidden' value='$nomcaserne' name='nomcaserne'>";
?>
<td><INPUT TYPE="submit" NAME="envoi" VALUE=" Valider "></input></td>
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
