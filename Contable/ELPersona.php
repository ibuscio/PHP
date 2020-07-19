  <?php
/*
 * Created on 31/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * 
 */
 	//session_start();// se crea una seccion con los siguientes datos
   $nombre     = $_POST["nombre"];
   $apellido   = $_POST["apellido"];
   $usuario    = $_POST["usuario"];
   $mail       = $_POST["mail"];
   $direccion  = $_POST["direccion"];
   $telefono   = $_POST["telefono"];
   $celular    = $_POST["celular"];
   $accion     = $_POST["accion"];
   $documento  = $_POST["documento"];
   $sucursal   = $_POST["sucursal"];
   
    echo $accion;  
    if($sucursal==""){ 
	   	include_once("Sucursal.php");
	 	$suc = new sucursal();
	 	$sucAux = $suc-> devuelve($usuario);
	 	$sucursal = $sucAux['sucursal'];
    }
   echo $sucursal;
   if ($accion == "eliminar"){
   	   include_once("datos.php");
   
   	 	include_once("controles.php"); //hago los controles de integridad al borra una sucursal
   		$conusu = new controles();
   		$hayusu = $conusu -> contro_usu($usuario) ;
   
		if ($hayusu == 0){
    		$consulta = new consulta();
    	
   			$dat = $consulta-> datos("Delete from `usuario` where documento = $documento" );
   				echo"<script language='JavaScript'>window.self.location='BPersona.php"."'</script>";
			}else{
				echo"<script language='JavaScript'>window.self.location='BPersona.php"."'</script>";
			}
		
   		}else{
   
   			include_once("datos.php");
  
   			$consulta = new consulta();
   			$dat = $consulta-> datos("update `usuario` set nombre ='$nombre', apellido='$apellido', celular='$celular', mail='$mail', telefono='$telefono', direccion='$direccion', sucursal='$sucursal' where documento = $documento "); 
    		echo"<script language='JavaScript'>window.self.location='BPersona.php"."'</script>";
   } 
 ?> 


  
        


  
       