<?php

 class consulta{
 	 Public $s;   
 	 
	 function datos($s){
	 include_once("Clase.php");
	 $conectarse = new coneccion;
	 $link = $conectarse-> conectarBase();
	 
     $result=mysql_query("$s",$link); 	 
	
	 return $result;

	 }
 }
?>

