 <?php
/*
 * Created on 31/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * 
 */
   $moneda   = $_POST["moneda"];
   $accion  = $_POST["accion"];
   $descripcion = $_POST["descripcion"];
   $signo = $_POST["signo"];
 
   if ($accion == "eliminar"){
   include_once("datos.php");
   
   include_once("controles.php"); //hago los controles de integridad al borra una sucursal
   $conmda = new controles();
   $haymda = $conmda -> contro_mda($moneda) ;
   //control de integridad
   if ($haymda == 0){
	   $consulta = new consulta();
	   $dat = $consulta-> datos("Delete from `moneda` where moneda = $moneda" );
	    echo"<script language='JavaScript'>window.self.location='BMoneda.php"."'</script>";
   		}else{
   			echo"<script language='JavaScript'>window.self.location='BMoneda.php"."'</script>";
   		} 
   }else{
   
   include_once("datos.php");
  
   $consulta = new consulta();
   $dat = $consulta-> datos("update `moneda` set descripcion ='$descripcion', signo= '$signo' where moneda='$moneda' "); 
    echo"<script language='JavaScript'>window.self.location='BMoneda.php"."'</script>";
   } 
 ?> 


  
       


<?php
/*
 * Created on 31/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * 
 */
   $moneda = $_POST["moneda"];
   echo $documento;
   include("datos.php");
  
   $consulta = new consulta();
   $dat = $consulta-> datos("Delete from `moneda` where moneda = $moneda" );
    echo"<script language='JavaScript'>window.self.location='AMoneda.php"."'</script>";
 ?> 


  
       