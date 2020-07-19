  <?php
/*
 * Created on 31/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * 
 */
 
   $rubro     = $_GET["rubro"];
   $idmovimiento   = $_GET["movimiento"];
   echo $rubro;
   echo $idmovimiento;
   include_once("datos.php");
   $consulta = new consulta();
   $dat = $consulta-> datos("Delete from `movimientos` where idmovimiento = $idmovimiento and rubro= $rubro" );
   echo"<script language='JavaScript'>window.self.location='Movimientos.php"."'</script>";
	
		
    
 ?> 


  
        


  
       