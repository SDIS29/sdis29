<?php

$profilLogin = $_SESSION['profilLogin'];

$sql = "SELECT * FROM LOGIN WHERE LOG_LOGIN='$profilLogin'";
$req = mysql_query($sql);
$data = mysql_fetch_array($req);



?>

<div id="nav">
    <ul>
        
<?php
if($data['LOG_PROFIL'] == 'SP')
{
    ?>
		<li class="nlink"><a href="../statut.php">Accueil</a></li>
        <li class="nlink"><a href="../01_SP/personnel_sp.php">Personnel</a></li>
        <li class="nlink"><a href="../01_sp/formation.php">Formation</a></li>
        <li class="nlink"><a href="../deconnexion.php">D&eacute;connexion</a></li>
    <?php
}
if($data['LOG_PROFIL'] == 'CTA')
{
    ?>
		<li class="nlink"><a href="../statut.php">Accueil</a></li>
        <li class="nlink"><a href="../02_cta/page_CTA_personnel.php">Personnel</a></li>
        <li class="nlink"><a href="../deconnexion.php">D&eacute;connexion</a></li>
    <?php
}
if($data['LOG_PROFIL'] == 'SF')
{
    ?>
		<li class="nlink"><a href="../statut.php">Accueil</a></li>
        <li class="nlink"><a href="../01_SP/personnel_sp.php">Personnel</a></li>
        <li class="nlink"><a href="../03_SF/pf71.php">Catalogue</a></li>
        <li class="nlink"><a href="../03_SF/pf6.php">Validation</a></li>


    <li class="nlink"><a href="../03_SF/Recherche.php">Recherche  </a></li>


        <li class="nlink"><a href="../deconnexion.php">D&eacute;connexion</a></li>
    <?php
}
?>

    </ul>
</div>