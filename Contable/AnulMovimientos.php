<?PHP
session_start();// se crea una seccion con los siguientes datos
$usuario = $_SESSION['usuario'];
//echo $usuario;
?>
<html><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Alta de Movimientos</title>
<style type="text/css">
<!--
.Titulo_pagina {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 24px;
}
.Estilo2 {
	font-size: 16px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo3 {font-size: 14px}
-->
</style>
</head>
<body>
<script type= "text/javascript" src="calendar.js"></script>
<script type= "text/javascript" src="lang/calendar-es.js"></script>
<script type= "text/javascript" src="lang/calendar-setup.js"></script>

<form method="get"  onSubmit="return validacion(this)"  name="doc" enctype="application/x-www-form-urlencoded" >
<p><strong>Ingrese el Movimiento a Anular</strong> </p>
<blockquote>
 
<table width="50%" height="30"  border="0">
 <!--tabla que contiene los datos para buscar por nombre y apellido-->
 <tr>
    <td height="10" valign="top">
<tr>
  <td>Id movimiento <input name="codmov" type="text" id="codmov" /> </td>
  
</tr>
 

</tr>
<tr>
  <td>Fecha <input name="fecha" type="text" id="campo_fecha" />Ej:aaaammdd </td>
  
</tr>
</table> <br/>
<p align="center"> 
<input name="submit_nom" type="submit"  value="Buscar"><A HREF="Index.php""> Ir a Menú </A> </p>     
<SCRIPT LANGUAGE="JavaScript">
      function validacion(f)  {
		
 			if (document.doc.fecha.value.length==0){
        		alert("Error:\nTiene que escribir una fecha")
        		document.doc.nombre.focus()
        		return false; 
      		}    
 			if (document.doc.importe.value.length==0){
        		alert("Error:\nTiene que escribir un importe")
        		document.doc.apellido.focus()
        		return false; 
      		}
      		
		}			      		

		
</SCRIPT>
</form>

<form action="link" method="post" onSubmit="return validacion(this)" enctype="text/plain">

  
<table width="80%" border="1">
	<tr bgcolor="#999999">
	<td height="23" valign="top"><div align="center">Id Movimiento</div></td> 
	<td  valign="top"><div align="center">Rubro</div></td>
	<td height="23" valign="top"><div align="center">Moneda</div></td>
	<td height="23" valign="top"><div align="center">Cred./Deb.</div></td>
	<td height="23" valign="top"><div align="center">Fecha</div></td>
	<td height="23" valign="top"><div align="center">Importe</div></td>
	<td height="23" valign="top"><div align="center">Usuario</div></td>
	<td height="23" valign="top"><div align="center">Sucursal</div></td>
    </tr>
  <?php
   //controla que botón fue activado y dependiendo de ésto ejecuta la consulta que debe ejecutar
	include_once("datos.php");
	$consulta = new consulta();
	//echo $_GET['codmov'] ;
	if ($_GET['codmov'] <> 0){
    $sql_rubro = $consulta->datos("select * from movimientos where idmovimiento = '$_GET[codmov]' and fecha='$_GET[fecha]' and ax4 = '00000000' and contabilizado = 'S'");
	}
	else{
	$sql_rubro = $consulta->datos("select * from movimientos where  fecha='$_GET[fecha]' and ax4 = '00000000' and contabilizado = 'S'");
	}
	
	while ($row = mysql_fetch_array($sql_rubro)) {
		echo "<tr>\n";	
		echo "<td align=center><a href=anulmovimiento.php?&idmov=$row[idmovimiento]>" . $row['idmovimiento'] ."</a>", "</td>";
		echo "<td align=center>" . $row['rubro'] . "</td>";
		echo "<td align=center>" . $row['moneda'] . "</td>";
		echo "<td align=center>" . $row['credeb'] . "</td>";
		echo "<td align=center>" . $row['fecha'] . "</td>";
		echo "<td align=center>" . $row['importe'] . "</td>";
		echo "<td align=center>" . $row['usuario'] . "</td>";
		echo "<td align=center>" . $row['ax5'] . "</td>";
		
		echo "</tr>\n";
	}
?> 
</table>
</form>

</body>
</html>




