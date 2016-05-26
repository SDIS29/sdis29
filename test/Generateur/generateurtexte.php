<?php
function mot_aleatoire () {
    // definition de la taille de la chaine
    $taille = rand(1, 12);
    //tableau des consonnes
    $c1 = array('b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z', 'dd', 'ff', 'll', 'mm', 'nn', 'pp', 'rr', 'ss', 'tt');
    //tableau des voyelles. certaines voyelles ont été doublées ou triplé, comme le a ou le e, car elles sont tres repandu, contrairement au y
    $c2 = array('a', 'a', 'a', 'e', 'e', 'e', 'i', 'i', 'o', 'o', 'u', 'u', 'y');

    $code="";
    //generation du code
    for ($i=1;$i<$taille;$i++) {    	$code .= ($i%2==0)?$c1[rand(0, count($c1)-1)]:$c2[rand(0, count($c2)-1)];
    }

    return $code;
}



//generateur de texte aléatoire
function lipsum ($nb_parag) {

	$nb_mot_parag = rand(70,100);

	$texte ="";
	for ($i=0; $i<$nb_parag; $i++) {
		$texte .= "<p>\n\n";
        for ($j=1; $j < $nb_mot_parag; $j++) {
        	$texte .= mot_aleatoire()." ";
        }
    	$texte .="</p>\n\n";
    }

	return ($texte);
}



echo lipsum(5);

?>
