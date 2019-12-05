<?php



  //$server="localhost";
//$user="id11248270_bereruiz";
//$pass="ibiricu";
//$basededatos="id11248270_sw13";

$server="localhost";
$user="root";
$pass="";
$basededatos="audios";

$email= $_SESSION['Email'];
$antigua= $_POST['antiguapass'];
$nueva= $_POST['nuevapass'];


$mysqli=mysqli_connect($server,$user,$pass,$basededatos);
$result= mysqli_query($mysqli,"SELECT nombre FROM usuario WHERE  Email='$email' and pass='$antigua'");
$cont=  mysqli_num_rows($result); 


if($cont==1){
    mysqli_query($mysqli,"UPDATE usuario SET pass='$nueva' where Email='$email' "); 
    mysqli_close( $mysqli);
    echo '<script >alert("Contraseña cambiada correctamente");</script>';
}else{
    echo '<script >alert("Contraseña incorrecta");</script>';
}

echo '<script >window.location.replace("TuPerfil.php");</script>';



 
?>