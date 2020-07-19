<html><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Alta de Moneda</title>
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
<form method="post"  onSubmit="return validacion(this)" onReset="return buscar(this)" Action="inmoneda.php" name="doc" enctype="application/x-www-form-urlencoded" >
<p><strong>Ingrese una Moneda</strong> </p>
<blockquote> 


  Moneda <input name="moneda" type="int"/><br/>
  Descripción <input name="descripcion" type="text" size="30" maxlength="30"/><br/>
  Signo <input name="signo" type="text" size="30" maxlength="30"/> 
<p align="center"> 
<input name="submit_nom" type="submit"  value="Agregar""><td> <A HREF="Index.php""> Ir a Menú </A> </td>

</p></td>
</tr>
 <SCRIPT LANGUAGE="JavaScript">
      function validacion(f)  {
		if (isNaN(f.moneda.value)) {
			alert("Error:\nEste campo debe tener sólo números.");
			f.rubro.focus();
			return (false);
 			}
 			if (document.doc.moneda.value.length==0){
        		alert("Error:\nTiene que escribir una moneda.")
        		document.doc.rubro.focus()
        		return false; 
      		}    
 			if (document.doc.descripcion.value.length==0){
        		alert("Error:\nTiene que escribir la descripcion de la moneda.")
        		document.doc.descripcion.focus()
        		return false; 
      		}
      		if (document.doc.signo.value.length==0){
        		alert("Error:\nTiene que escribir el segino de la moneda. Ejemplo: $")
        		document.doc.descripcion.focus()
        		return false; 
      		} 			      		
		}
</SCRIPT>
</form>
</body>
</html>




