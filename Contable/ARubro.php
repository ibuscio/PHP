<html><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Alta de Rubro</title>
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
<form method="post"  onSubmit="return validacion(this)" onReset="return buscar(this)" Action="inrubro.php" name="doc" enctype="application/x-www-form-urlencoded" >
<p><strong>Ingrese el Rubro</strong> </p>
<blockquote> 


  <table aling="center">
    <tr>
      <td> Rubro <input name="rubro" type="int"/><br/></td>
    
    </td>
    <td>Caja  
	    <select name='caja'>
	    	<option>Seleccione </option>
		    <option>SI </option>
		    <option>NO </option>
		</select>
    </td>
</tr>
    <tr>
      <td> Descripcion <input name="descripcion" type="text" size="30" maxlength="30"/></td>
    </tr>
   <tr>
      <td>  
			<input name="submit_nom" type="submit"  value="Agregar"><A HREF="Index.php""> Ir a Men� </A> 
	  </td>
    </tr>
  </table>

</tr>
 <SCRIPT LANGUAGE="JavaScript">
      function validacion(f)  {
		if (isNaN(f.rubro.value)) {
			alert("Error:\nEste campo debe tener s�lo n�meros.");
			f.rubro.focus();
			return (false);
 			}
 			if (document.doc.rubro.value.length==0){
        		alert("Error:\nTiene que escribir un rubro")
        		document.doc.rubro.focus()
        		return false; 
      		}    
 			if (document.doc.descripcion.value.length==0){
        		alert("Error:\nTiene que escribir la descripcion del rubro")
        		document.doc.descripcion.focus()
        		return false; 
      		}
      			if (document.doc.caja.value<>"SI" or "NO"){
        		alert("Error:\nDebe seleccionar si el rubro es caja o no")
        		document.doc.rubro.focus()
        		return false; 
      	
      		
		}
      
      
  </SCRIPT>
  
</form>
</body>
</html>




