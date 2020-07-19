<?php
/*
 * Created on 31/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * 
 */
   $rubro   = $_POST["rubro"];
   $accion  = $_POST["accion"];
   $descripcion = $_POST["descripcion"];
 
   if ($accion == "eliminar"){
   include_once("datos.php");
   
   include_once("controles.php"); //hago los controles de integridad al borra una sucursal
   $conrub = new controles();
   $hayrubro = $conrub -> contro_rub($rubro) ;
   //control de integridad
  
   if ($hayrubro == 0){
   		$consulta = new consulta();
   		$dat = $consulta-> datos("Delete from `rubro`  where rubro = $rubro" );
    	echo"<script language='JavaScript'>window.self.location='BRubro.php"."'</script>";
   		}else{
   			echo"<script language='JavaScript'>window.self.location='BRubro.php"."'</script>";
   		}
   }else{
   
   include_once("datos.php");
  
   $consulta = new consulta();
   $dat = $consulta-> datos("update `rubro` set descripcion ='$descripcion' where rubro='$rubro' "); 
    echo"<script language='JavaScript'>window.self.location='BRubro.php"."'</script>";
   } 
 ?> 


  
       