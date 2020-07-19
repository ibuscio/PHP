
<?php
/*
 * Created on 31/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
   $rubro   = $_POST["rubro"];
   $descripcion   = $_POST["descripcion"];
   $caja = 0;
   if ($_POST["caja"]== "NO"){
   $caja = 0;
   }else{
   	if ($_POST["caja"]== "SI"){
   		$caja = 1;
   	}
   	
   }
   echo $caja; 
   echo $rubro;
   echo $descripcion;
   if (($rubro<> 0) and ($descripcion<> "")){
	   include("datos.php");
	   
	   $consulta = new consulta();
	   $dat = $consulta-> datos("INSERT INTO `rubro` (`rubro`, `descripcion`, `ax1`, `ax2`) " .
	   		"VALUES ( '$rubro', '$descripcion', $caja, '0');");
	    echo"<script language='JavaScript'>window.self.location='ARubro.php"."'</script>";
   }	    
   else{
   	   echo "El campo Rubro, Descripcion o Caja no fueron bien seleccionados"
;   }	    
 ?>  
       