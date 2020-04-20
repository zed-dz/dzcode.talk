<?php

$t = array(1,2,3,4);  

echo " la taille du tab est ". count($t) . '<br>';  

foreach ($t as $k) { 	echo $k ." element <br>";	}

//$tab["algerie"]="blida";	$tab["united kingdom"]="london"; $tab["united states"]="new york";

$tab = array("algeria"=>"blida","ukingdom"=>"london","ustates"=>"new york");

foreach ($tab as $k => $k_value) {  echo "clé ". $k ." valeur ". $k_value ."<br>" ;   }

$p[0]="gooool"; $p[1]="zlatan"; $p[4]="but";

foreach ($p as $key => $val) { echo "clé ". $key ." valeur ". $val ."<br>" ; }

for ($i=0; $i < count($p)-1; $i++) {  
echo $p[$i] . '<br>'; 
if ( $i == count($p)-2){ echo " la valeur a deppaser la boucle "; exit(); } }







?>