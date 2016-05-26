<?php
// Connexion à la base de données
include '../connect/connexion.php';

// Inclusion de l'header
include '../includes/header.inc.php';

// Inclusion du menu
include '../includes/nav.inc.php';

?>
<!-- Page PF71 -->
<div id="content">
    <div id="left"> <span class="flt-lft"></span>

	<h3>LISTE DES FORMATIONS</h3>

	<table cellspacing="15" style="border:1px solid black">
	<?php
	$sql = "SELECT FOR_ID, FOR_LIBELLE, FOR_DTE_DEBUT FROM formation";
	$req = mysql_query($sql) or die(mysql_error());

	while($data = mysql_fetch_array($req))
	{
	?>

	<tr>
		<td><?php echo $data['FOR_LIBELLE']; ?></td>
		<td><?php echo date("d/m/Y", strtotime($data['FOR_DTE_DEBUT'])); ?></td>
		<td><a href="pf71_modification.php?id=<?php echo $data['FOR_ID']; ?>"><img src="../images/tool.png" style="width:50%"></a></td>
		<td><a href="pf71_suppression.php?id=<?php echo $data['FOR_ID']; ?>"><img src="../images/cancel.png" style="width:50%"></a></td>
	</tr>

	<?php
	}
	?>
	</table>
	<table cellspacing="15px">
      <tr>
        <td>
          <a href="pf72.php">Ajouter</a>
        </td>
        <td>
          <a href="../statut.php">Quitter</a>
        </td>
      </tr>
    </table>
    </div>
    <div style="clear:both"></div>


<?php
// Inclusion du footer
include '../includes/footer.inc.php';
?>

</div>
</body>
</html>


