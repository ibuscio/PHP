<?php
session_start();// se crea una seccion con los siguientes datos
$_SESSION['usuario'] =$_POST["usuario"];  
	
if (isset($_POST["usuario"])) {
$username = $_POST["usuario"];
$contrasena = $_POST["contrase�a"];
// Comprobamos si el nombre de usuario o la cuenta de correo ya
include_once("datos.php");
$consulta1 = new consulta();
$sql_usuario = $consulta1-> datos("select * from usuario where usuario='$username' and contrase�a='$contrase�a'");
$username_exist = mysql_num_rows($sql_usuario);
//echo $username_exist;
} 

if ($username_exist>0) {	
   echo"<script language='JavaScript'>window.self.location='Index.php"."'</script>";
}else{
	if ($username_exist == 0){
    echo "Usuario inexsistente en la base de datos";
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta name="generator" content="HTML Tidy, see www.w3.org">
<meta http-equiv="Content-Type" content=
"text/html; charset=iso-8859-1">
<title>Login</title>

</head>
<body>
<form method="post" onsubmit="return validacion(this)" name="doc"
enctype="application/x-www-form-urlencoded">
<p><strong>Ingrese un Usuario</strong></p>

Usuario <input name="usuario" type="text" onkeyup=
"this.value=this.value.toUpperCase()"><br>
 Contrase&ntilde;a <input name="contrase&ntilde;a" type="password"
size="30" maxlength="30"> 

<p><input name="submit_nom" type="submit" value="Aceptar"></p>

<script type="text/javascript" language="JavaScript">
      function validacion(f)  {
            if (document.doc.usuario.value.length==0){
                alert("Error:\nDebe ingresar un usuario")
                document.doc.rubro.focus()
                return false; 
            }    
            if (document.doc.contrase�a.value.length==0){
                alert("Error:\nDebe ingresar una contrase�a")
                document.doc.descripcion.focus()
                return false; 
            }                        
        }
  
</script>

</form>
</body>
</html>

