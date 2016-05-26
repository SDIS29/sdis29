<?php
// Connexion à la base de données
include '../connect/connexion.php';

// Inclusion de l'header
include '../includes/header.inc.php';

// Inclusion du menu
include '../includes/nav.inc.php';


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
    <div style="clear:both"></div>


<?php
// Inclusion du footer
include '../includes/footer.inc.php';
?>

</div>
</body>
</html>


