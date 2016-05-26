<?php

// Connexion à la base de données
include 'connect/connexion.php';
// Inclusion de l'header
include 'includes/header.inc.php';




?>
<!-- Pour l'identification -->
<div id="content">
    <div id="left"> <span class="flt-lft"></span>
    <form method="POST" action="GestionConnexionFormulaire.php">
    
    <table cellspacing="15">
      <tr>
        <td>
          <label for="login">Utilisateur</label>
        </td>
        <td>
          <input name="login" id="login" type="text" value=""/>
      </tr>
      <tr>
        <td>
          <label for="password">Mot de passe</label>
        </td>
        <td>
          <input name="password" id="password" type="password" value=""/>
        </td>
      </tr>
      <tr>
        <td>
          &nbsp;
        </td>
        <td>
          <input type="submit" name="envoi_connexion" value="Se connecter"></input>
        </td>
      </tr>
    </table>
    </form>
    </div>
    <div style="clear:both"></div>
<?php
// Inclusion du footer
include 'includes/footer.inc.php';
?>
</div>
</body>
</html>