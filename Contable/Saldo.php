<?php
/*
 * Created on 31/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * 
 * 
 */
 
 class saldo{
 	 Public $rubro, $sucursal;   
 	 
	 function control($rubro, $sucursal){
	 	
	 include_once("datos.php");
	 $consulta = new consulta();
   	 $dat = $consulta-> datos("select * from `saldos` where rubro = '$rubro' and sucursal='$sucursal'" ); 	 
	 $row = mysql_fetch_array($dat);
	 
	 return $row;

	 }
     function cerrar(){
     
      mysql_close($link);
     }
     function insertsaldo($rubro, $sucursal, $fecha, $moneda, $saldo){
	 	
	 include_once("datos.php");
	 $consulta = new consulta();
   	 $dat = $consulta-> datos("INSERT INTO `saldos` (`rubro`, `sucursal`, `fecha`, `moneda`, `saldo`) " .
   		                                  "VALUES ( '$rubro', '$sucursal', '$fecha', '1', '$saldo');" ); 	 
	
	 }
	 function insert_motivo($idmovimiento, $motivo){
	 	
	 include_once("datos.php");
	 $consulta = new consulta();
   	 $dat = $consulta-> datos("INSERT INTO `motivosmov` (`idmovimiento`, `motivo`) " .
   		                                  "VALUES ( $idmovimiento, '$motivo');" ); 	 
	
	 }
	 function obtengo_motivo($idmovimiento){
	 	
	 include_once("datos.php");
	 $consulta = new consulta();
   	 $motivo_obt = $consulta-> datos("select motivo from `motivosmov` where idmovimiento = '$idmovimiento'");
   	 $motivo = mysql_fetch_array($motivo_obt);
   	 return $motivo; 	                                   	 
	
	 }
	 function modificar($rubro, $sucursal, $saldo){
	 	
	 include_once("datos.php");
	 $consulta = new consulta();
	 echo $rubro, $sucursal, $saldo;
	 if ($saldo <> 0){
   	 	$dat = $consulta-> datos("update `saldos` set saldo ='$saldo' where rubro='$rubro' and sucursal='$sucursal'");
	 }else{
	 	$dat = $consulta-> datos("update `saldos` set saldo ='$saldo', ax2=99 where rubro='$rubro' and sucursal='$sucursal'");
	 }
	 

	 }
	 function modificarMov($idmov, $fecha){
	 	
	 include_once("datos.php");
	 $consulta = new consulta();
	 echo $rubro, $sucursal, $saldo;
   	 $dat = $consulta-> datos("update `movimientos` set ax4 ='$fecha', contabilizado ='A' where idmovimiento = '$idmov' ");
	
	 }
	 
	 function LisSaldo(){
	 	
	 include_once("datos.php");
	 $consulta = new consulta();
   	 $dat = $consulta-> datos("select rubro, saldo from `saldos` group by rubro, saldo ");
   	 $row = mysql_fetch_array($dat);
	 
	 return $row;
	 }
	 
	 function LisSaldoSuc($sucursal){
	 	
	 include_once("datos.php");
	 $consulta = new consulta();
	 $suc = "N";
	 if ($sucursal == 999){
	 	  $consulta_saldo= "select a.rubro, b.descripcion, sum(a.saldo) as saldo from `saldos` a, `rubro` b where a.rubro=b.rubro group by a.rubro";
	 }else{
	 	  $consulta_saldo= "select c.descripcion, a.rubro, b.descripcion as desc_sal, a.saldo from `saldos`a, `rubro` b, `sucursal` c where a.sucursal='$sucursal' and a.rubro=b.rubro and  a.sucursal=c.sucursal order by a.sucursal, a.rubro ";
	 	  $suc = "S";	
	 }
	 
   	 	 $dat = $consulta-> datos($consulta_saldo);
   	     $i = 2; //la primera posicion la guardo para poner el contador
	   	 while ($row = mysql_fetch_array($dat)) {
	   	 	if ($suc == "S"){
	   	 	$i = $i + 1	;	
	   	 	$resultado_consulta[$i] = $row['descripcion'];
	   	 	$i = $i + 1	;
	   	 	$resultado_consulta[$i] = $row['rubro'];
	   	 	$i = $i + 1	;	
	   	 	$resultado_consulta[$i] = $row['desc_sal'];
	   	 	$i = $i + 1	;
	   	 	$resultado_consulta[$i] = $row['saldo']; 
	   	 	}else{
	   	 	$i = $i + 1	;
	   	 	$resultado_consulta[$i] = $row['descripcion'];
	   	    $i = $i + 1	;
	   	 	$resultado_consulta[$i] = $row['rubro'];
	   	 	$i = $i + 1	;
	   	 	$resultado_consulta[$i] = $row['saldo'];
	   	 	}
					 
	   	 }
	   	 $resultado_consulta[1] = $i;
	   	 $resultado_consulta[2] = $suc;
	   	 return $resultado_consulta; 
	   	 
	 }
 }
?>

