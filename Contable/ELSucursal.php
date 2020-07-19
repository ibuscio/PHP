 
 <?php
/*
 * Created on 31/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * 
 */
   $sucursal   = $_POST["sucursal"];
   $accion  = $_POST["accion"];
   $descripcion = $_POST["descripcion"];
 
   if ($accion == "eliminar"){
   include_once("datos.php");
   
   include_once("controles.php"); //hago los controles de integridad al borra una sucursal
   $consuc = new controles();
   $haysuc = $consuc -> contro_suc($sucursal) ;
   
	   if ($haysuc == 0){
		   $consulta = new consulta();
		   $dat = $consulta-> datos("Delete from `sucursal`  where sucursal = $sucursal"  );
		    echo"<script language='JavaScript'>window.self.location='BSucursal.php"."'</script>";
	   		}else{
	   			echo"<script language='JavaScript'>window.self.location='BSucursal.php"."'</script>";
	   		}
   }else{
   
   include_once("datos.php");
  
   $consulta = new consulta();
   $dat = $consulta-> datos("update `sucursal` set descripcion ='$descripcion' where sucursal='$sucursal' "); 
    echo"<script language='JavaScript'>window.self.location='BSucursal.php"."'</script>";
   } 
 ?> 


  
       


  
       