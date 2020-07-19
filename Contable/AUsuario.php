<html><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Alta de Usuario</title>
<!--<link href="estilo/default.css" rel="stylesheet" type="text/css" />-->
</head>
<body>
<form method="post"  onSubmit="return validacion(this)" Action="inusuario.php" name="doc" enctype="application/x-www-form-urlencoded" >

  <h2 align="center">Ingrese una persona</h2>
   

  <table align="center">
    <tr>
      <td> Documento* <input name="documento" type="int"/></td>
    </tr>
    <tr>
      <td>Nombre* <input name="nombre" type="text" size="30" maxlength="30"/></td>
    </tr>
    <tr>
      <td>Apellido* <input name="apellido" type="text" size="30"/></td>
    </tr>
    <tr>
      <td>Usuario* <input name="usuario" type="text" size="30" onkeyup = "this.value=this.value.toUpperCase()"/></td>
    </tr>  
    <tr>
      <td>Contraseña* <input name="contraseña" type="password"/></td>
    </tr>   
     <tr>
      <td height="10" valign="top">Sucursal*
		  <?PHP
		    echo "<select name='sucursal'>";
			include("datos.php");
		    $consulta = new consulta();
		    $dat = $consulta-> datos("select * from sucursal");
			while ($fila = mysql_fetch_array($dat))
			{
			echo "<option value=".$fila["sucursal"].">".$fila["descripcion"]."</option>";  
			}
		    echo "</select>"
		?> 
    </td>
    </tr>
     <tr>
      <td>Dirección <input name="direccion" type="text" size="30"/>Ejemplo:Florida:375</td>
    </tr> 
    <tr>
    <td>Mail* <input name="mail" type="text" size="30"/></td>
    </tr>
     <tr>
    <td>Telefono <input name="telefono" type="text"/> </td>
    </tr> 
    <tr>
    <td>Celular <input name="celular" type="text"/> </td>
    </tr>   
    <tr>
    <td>*Campos Obligatorios</td>
    </tr>   
    <tr>
	  <td><input name="submit_nom" type="submit"  value="Agregar""><A HREF="Index.php""> Ir a Menú </A></td>
	</tr>
  </table>
    <SCRIPT LANGUAGE="JavaScript">
      function validacion(f)  {
		if (isNaN(f.documento.value)) {
			alert("Error:\nEl campo documento debe ser numerico solamente.");
			f.documento.focus();
			return (false);
 			}
 			if (document.doc.nombre.value.length==0){
        		alert("Error:\nTiene que escribir un nombre")
        		f.document.doc.nombre.focus()
        		return false; 
      		}    
 			if (document.doc.apellido.value.length==0){
        		alert("Error:\nTiene que escribir el apellido de la persona")
        		document.doc.apellido.focus()
        		return false; 
      		}
      		if (document.doc.usuario.value.length==0){
        		alert("Error:\nTiene que escribir un usuario")
        		document.doc.usuario.focus()
        		return false; 
      		}
      		if (document.doc.contraseña.value.length==0){
        		alert("Error:\nTiene que escribir una contraseña")
        		document.doc.contraseña.focus()
        		return false; 
      		}
      		if (document.doc.sucursal.value.length==0){
        		alert("Error:\nTiene que seleccionar una sucursal")
        		document.doc.sucursal.focus()
        		return false; 
      		}
      		if (document.doc.mail.value.length==0){
        		alert("Error:\nTiene que escribir un mail")
        		document.doc.mail.focus()
        		return false; 
      		}
      		if (document.doc.direcion.value.length==0){
        		alert("Error:\nTiene que escribir una direción")
        		document.doc.direccion.focus()
        		return false; 
      		}
      		if (document.doc.telefono.value.length==0){
        		alert("Error:\nTiene que escribir un telefono")
        		document.doc.telefono.focus()
        		return false; 
      		}
      		if (document.doc.celular.value.length==0){
        		alert("Error:\nTiene que escribir un celular")
        		document.doc.celular.focus()
        		return false; 
      		}      		
		}
   
  </SCRIPT>


</form>
</body>
</html>




