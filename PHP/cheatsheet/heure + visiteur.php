<?php 

if (file_exists("visite")) {  

$fichier = fopen("visite" , "r+");

$n = fgets($fichier);

$n++;

echo "il ya ". $n ." visiteurs ".date("F d Y H:i:s.", filectime('visite'));

fseek($fichier,0);

fputs($fichier,$n);

fclose($fichier);

} else { echo "fichier nexiste pas"; }

exit();

 ?>