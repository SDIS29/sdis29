<?php

include '../connect/connexion.php';
 
	if(empty($_POST['login']) OR empty($_POST['password'])) {   
    
        echo "Le champ Utilisateur est vide.";
    }else{   
        //Sécurisation des données entrées par le membre
        $login = $_POST['login']; 
        $password = $_POST['password'];

        //On vérifie que les données correspondent dans la base de données 
        $sql = "SELECT * FROM LOGIN WHERE LOG_LOGIN='$login' AND LOG_MDP='$password'";
        $result = mysql_query($sql) or die (mysql_error());

        if(mysql_num_rows($result) > 0)
        {
            $data = mysql_fetch_array($result);
            session_start();
            $_SESSION['profilLogin'] = $data['LOG_LOGIN'];
            header('Location: ../includes/nav.inc.php');
        }
        else
        {
            $message = 'Erreur dans les logins.';
            include('../index.php');
        }
    }     
?>


