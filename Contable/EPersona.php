<html><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Eliminar Persona</title>
<style type="text/css">

Titulo_pagina {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 24px;
}
Estilo2 {
	font-size: 16px;
	font-family: Arial, Helvetica, sans-serif;
}
Estilo3 {font-size: 14px}

</style>
</head>

<body>
<form method="post"  onSubmit="return delete_confirmation()" Action="ELPersona.php" name="doc" enctype="application/x-www-form-urlencoded" >
<p><strong>Administración de persona</strong> </p>
<blockquote> 
<table width="90%" height="30"  border="1">
 <!--tabla que contiene los datos para buscar por nombre y apellido-->

 <tr>
 	<td>Documento
    <?PHP
	   echo "<input name='documento' readonly='true' value=".$_GET['documento'].">"."</input>";  
      ?>
    </td>
    <td height="10" valign="top">Nombre
     <?PHP
	   echo "<input name='nombre' value=".$_GET['nombre'].">"."</input>"; 
      ?>
    </td>
    <td>Apellido
    <?PHP
	   echo "<input name='apellido'  value=".$_GET['apellido'].">"."</input>";  
      ?>
    </td>
    <td>Usuario
    <?PHP
	   echo "<input name='usuario'  value=".$_GET['usuario'].">"."</input>";  
      ?>
    </td>
   
 </tr>
 <tr>
 </tr>
 <td>Mail
    <?PHP
	   echo "<input name='mail'  value=".$_GET['mail'].">"."</input>";  
      ?>
    </td>
    <td height="10" valign="top">Telefono
     <?PHP
	   echo "<input name='telefono'  value=".$_GET['telefono'].">"."</input>"; 
      ?>
    </td>
    <td>Celular
    <?PHP
	   echo "<input name='celular' value=".$_GET['celular'].">"."</input>";  
      ?>
    </td>
    <td>Dirección
    <?PHP
	   echo "<input name='direccion'  value=".$_GET['direccion'].">"."</input>";  
      ?>
    </td>
     <td height="10" valign="top">Sucursal
  <?PHP
    echo "<select name='sucursal' value=".$_GET['descripcion'].">";
	include("datos.php");
    $consulta = new consulta();
    $dat = $consulta-> datos("select * from sucursal");
   
	while ($fila = mysql_fetch_array($dat))
	{
	echo "<option value=".$fila["sucursal"].">".$fila["descripcion"]."</option>";  
	}
    echo "</select>"
?> 
 </tr>
  </tr>  
 <tr>
  </tr>  
</table>
<table align center>  
 <tr>
 <td align="center">Acción
	    <select name='accion'>
	    	<option> </option>
		    <option>modificar </option>
		    <option>eliminar </option>
		</select>
    </td>
 <tr> 
 </tr>       
</table>
</div>
<p align="center"> 
<input name="submit_nom" type="submit"  value="Aceptar""><A HREF="Index.php""> Ir a Menú </A> 


</p></td>
</tr>
 <SCRIPT LANGUAGE="JavaScript">
   function delete_confirmation() {

		return confirm("¿Esta ud seguro que desea modificar o eliminar el usuario?");

}        
</SCRIPT>

</form>
</body>
</html>

