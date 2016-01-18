<?php 
//Variables de conexion a la base de datos 
define("DB_HOST","localhost" );
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_DATABASE", "usuarios" ); 
//define("DB_TABLE", "usuarios" ); 


// Conexion a la base de datos en si misma 
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
if (mysqli_connect_errno()){
 echo "Imposible conectarse a la base de datos: " .
mysqli_connect_error();
} else {

// username and password sent from form  
$nombre = $_POST['email'];
$contraseña = $_POST['password']; 

$nombre = mysqli_real_escape_string($con, $_POST['email']);
$contraseña = mysqli_real_escape_string($con, $_POST['password']); 
$res = mysqli_query($con, "SELECT nombre FROM usuarios WHERE correo = '$nombre' AND password = '$contraseña'"); 

if(mysqli_num_rows($res) == 0){ 
    
    echo"<center> 
<h1><font color='red'>Error, usuario o contrase&ntilde;a incorrectos!<br> 
<a href='index.php'>Inicio</a>"; 
     
}else { 
      
    echo"<center> 
    <h1><font color='red'>Te has conectado correctamente!<br> 
    <a href='index.php'>Inicio</a>"
    ; 
    
     
    //header("location:inicio.php");
}
}
?> 