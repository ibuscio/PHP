<?php
/*
 * Created on 31/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * 
 * 
 */
 
 class controles{
 	 Public $rubro, $sucursal, $moneda, $usuario;   
 	 
	 function contro_suc($sucursal){
	 	
	 include_once("datos.php");
	 $consulta = new consulta();
   	 $dat = $consulta-> datos("select * from `saldos` where  sucursal='$sucursal'" ); 	 
	 $cantrowsuc = mysql_num_rows($dat);
	  
	 return $cantrowsuc;

	 }
     function contro_mda($moneda){
	 	
	 include_once("datos.php");
	 $consulta = new consulta();
   	 $dat = $consulta-> datos("select * from `saldos` where  moneda='$moneda'" ); 	 
	 $cantrowmda = mysql_num_rows($dat);
	 
	 return $cantrowmda;

	 }	 
	 function contro_usu($usuario){
	 	
	 include_once("datos.php");
	 $consulta = new consulta();
   	 $dat = $consulta-> datos("select * from `movimientos` where usuario = '$usuario' " ); 	 
	 $cantrowusu = mysql_num_rows($dat);
	 
	 return $cantrowusu;

	 }	
	 function contro_rub($rubro){
	 	
	 include_once("datos.php");
	 $consulta = new consulta();
   	 $dat = $consulta-> datos("select * from `saldos` where rubro = '$rubro'" ); 	 
	 $cantrowrub =  mysql_num_rows($dat);
	 
	 return $cantrowrub;

	 }
	 
	 function control_movimientos($credeb){
	 	
	 include_once("datos.php");
	 $consulta = new consulta();
	 
   	 $dat = $consulta-> datos("select Sum(importe) as imp from `movimientos` where credeb =  '$credeb' and contabilizado='E'" ); 	 
	 while ($row = mysql_fetch_array($dat, MYSQL_ASSOC)) {
		 		$importe_mov = $row[imp];
	 }	 		
		
		return $importe_mov;

	 }	  
	 function rubro_caja($rubro){
	 	
	 include_once("datos.php");
	 $consulta = new consulta();
   	 $dat = $consulta-> datos("select ax1 from `rubro` where rubro =  '$rubro'" ); 	 
	 while ($row = mysql_fetch_array($dat, MYSQL_ASSOC)) {
		 		$cajaaux = $row[ax1];
	}	 	
		if ($cajaaux ==1){
			$escaja = 'SI';
		}else
		{
			$escaja = 'NO';
		}
		 
		return $escaja;

	 }	  
	  function retorna_mov(){
		 include_once("Clase.php");
		 $conectarse = new coneccion;
		 $link = $conectarse-> conectarBase();

		 include_once("datos.php");		 
		 $consulta = new consulta();
		 $dat = $consulta-> datos("select idmov from `codmov` where idcor = 1 order by idmov desc limit 1" ); 	 
		 $row = mysql_fetch_array($dat); 
		 $movimiento = $row[idmov];		 
		 return $movimiento;

	 }
	 function inserta_mov($idmov){
		 include_once("Clase.php");
		 $conectarse = new coneccion;
		 $link = $conectarse-> conectarBase();
		 echo "pepe".$idmov;	
		 include_once("datos.php");		 
		 $consulta = new consulta();
		 $dat = $consulta-> datos("update `codmov` set `idmov` = '$idmov' where  `idcor` = '1'") ; 	 
		 
		 
	 }
	 	  
 }
?>

