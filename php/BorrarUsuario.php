<?php 
	//$server="localhost";
	//$user="id11248270_bereruiz";
	//$pass="ibiricu";
  //$basededatos="id11248270_sw13";
 //INSERT INTO USUARIO(EMAIL, Nombre,Apellidos,Pass) VALUES ('momo@ehu.eus','Momo','Hirai','momorin')

	 $server="localhost";
   $user="root";
   $pass="";
   $basededatos="audios";

   $email= $_SESSION['Email'];
   $mysqli=mysqli_connect($server,$user,$pass,$basededatos);
   $resultado= mysqli_query($mysqli,"DELETE FROM usuario WHERE Email='$email'");
   mysqli_close( $mysqli);
  

 ?>