<?PHP
session_start();// se crea una seccion con los siguientes datos
$usuario=$_SESSION['usuario'];		
   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en_US" xml:lang="en_US">
<!--
 * Created on 5/09/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
-->
 <head>
  <title> Sistema de Contabilidad</title>
<!--   <link href="estilo/default.css" rel="stylesheet" type="text/css" />-->
 </head>
 <body>
  <form action="link"  enctype="text/plain">
  <h1 align="center">Sistema de Contabilidad</h1>
  <table align ="center">
  <tr>
  <td>
  </td>
  </tr>
  <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
  <tr>
  <td align ="center"><a href="Movimientos.php" class="clase2">Agregar Movimiento</a></td>
  <td align ="center"><a href="AnulMovimientos.php" class="clase2">Anular Movimiento</a></td>
  <td align ="center"><a href="Saldos.php" class="clase2">Consulta de Saldo por Rubro</a></td>
  </tr>
  <tr>
  <td><a href="AMovimientos.php" class="clase2">Listados</a></td>
  </tr>
  </table>		
  <table align ="right">
  <tr>
      <td>Bienvenido <?PHP echo $usuario; ?> </td>
  </tr>
  </table><br><br>
  
<table width="180" cellspacing="2" cellpadding="2" border="0" align="center" >
<tr>
    <td align ="center" ><a href="AUsuario.php" class="clase1">Alta de Persona</a></td>
 
</tr>
<tr>
    <td align ="center"><a href="BPersona.php" class="clase1">Buscar Persona</a></td>
</tr>

<tr>
    <td align ="center" ><a href="AMoneda.php" class="clase1">Alta de Moneda</a></td>
</tr>
<tr>
    <td align ="center" ><a href="BMoneda.php" class="clase1">Buscar Moneda</a></td>
</tr>
<tr>
    <td align ="center" ><a href="ARubro.php" class="clase1">Alta de Rubro</a></td>
</tr>
<tr>
    <td align ="center" ><a href="BRubro.php" class="clase1">Buscar de Rubro</a></td>
</tr>
<tr>
    <td align ="center" ><a href="ASucursal.php" class="clase1">Alta de Sucursal</a></td>
</tr>
<tr>
    <td align ="center" ><a href="BSucursal.php" class="clase1">Buscar Sucursal</a></td>
</tr>
<tr>
    <td align ="center" ><a href="Session.php" class="clase1">Cerrar Session</a></td>
</tr>


</table>		  
</form>
</body>
</html>
