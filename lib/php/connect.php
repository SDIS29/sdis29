<?php
	
	$ip=explode(".",$_SERVER['SERVER_ADDR']);
	
	switch ($ip[0]) {
		
		case 127 :
			//local
			$host = "127.0.0.1";
			$user = "root";
			$password = "";
			$dbname = "";
			break;
			
		case 172 :
			//olympe
			$host = "sql.olympe.in";
			$user = "";
			$password = "******";
			$dbname = "";
			break;
			
		default :
			exit ("Serveur non reconnu...");
			break;	
	}
	
	$link = mysql_connect($host,$user,$password)
		or die("Impossible de se connecter : ".mysql_error());
	//echo "Connexion reussie<br />";
 	  	
    $connexion = mysql_select_db($dbname)
        or die("Impossible d'ouvrir la base : ".mysql_error());
    //echo "Base $dbname selectionnee... <br />";

    ?>