<html><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Eliminar Sucursal</title>
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
<form method="post"  onSubmit="return delete_confirmation()" Action="ELSucursal.php" name="doc" enctype="application/x-www-form-urlencoded" >
<p><strong>Administración de sucursal</strong> </p>
<blockquote> 
<table width="50%" height="30"  border="1">
 <!--tabla que contiene los datos para buscar por nombre y apellido-->

 <tr>
    <td height="10" valign="top">Sucursal
     <?PHP
	   echo "<input name='sucursal' readonly='true' value=".$_GET['sucursal'].">"."</input>";  
	
      ?>
    <td>Localidad 
    <?PHP
	   echo "<input name='descripcion'  value=".$_GET['localidad'].">"."</input>";  
	
      ?>
    </td>
    </td>
  
   </td>
 </tr>        
</tr></table>
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
<input name="submit_nom" type="submit"  value="Aceptar">
<A HREF="Index.php""> Ir a Menú </A>

</p></td>
</tr>
 <SCRIPT LANGUAGE="JavaScript">
   function delete_confirmation() {

		return confirm("¿Esta ud seguro que desea modificar o eliminar este registro?");

}

        
  </SCRIPT>

</form>
</body>
</html>

