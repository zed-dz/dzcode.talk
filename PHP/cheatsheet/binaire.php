<?php 

$d = rand(1,99);  $s = ""; $nbr = $d;
	 while($d > 0){   $s = ($d%2).$s;  $d = (int) $d/2;  }
echo " le binaire du nbr ". $nbr . " est ". $s;

 ?>