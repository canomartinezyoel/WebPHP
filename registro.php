<?php 
session_start(); 
//Variables de conexion a la base de datos 
define("DB_HOST","localhost" );
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_DATABASE", "usuarios" ); 


$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
if (mysqli_connect_errno())
{
 echo "Imposible conectarse a la base de datos: " .
mysqli_connect_error();
} else {
 

//Variables que toman valor de lo enviado desde el form 

     

$emailaux = mysqli_query($con, "SELECT correo FROM usuarios WHERE correo = '$_POST[email]'"); 
$email = $_POST['email'];

if (mysqli_num_rows($emailaux) == 0){ //Si no existe un usuario con ese mail 

echo("<center> 
<h1><font color='red'>El usuario<br><font color='blue'> $email<br><font color='red'>se ha registrado correctamente!<br><a href='index.php'>Inicio</a>"); 
mysqli_query($con, "INSERT INTO usuarios (correo,password) VALUES ('$_POST[email]','$_POST[password]')");
 
}else{//Si el usuario no existe 
echo("<center> 
<h1><font color='red'>El usuario<br><font color='blue'> $email<br><font color='red'>ya exisiste! Introduce nuevo correo.<br><a href='index.php'>Inicio</a>"); 
 
} 
} 
?> 