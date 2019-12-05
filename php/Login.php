<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  
  
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section>
    <div class="row">
        
        <div class="column" style="background-color:#aaa;">
            <form action="Login.php" method="post">
                <h1>Login</h1>
                    <div>
                    Email: <input type="text" name="email" >
                    </div>
                    <br>

                    <div>
                    Contrase&ntilde;a: <input type="password" name="pass">
                    </div>
                    <br>

                    <input type="submit" value="Enviar" name="boton" >			
                    
                    <br>
            </form>

        </div>

        <div class="column" style="background-color:#aaa;">
            <form action="Login.php" method="post">
                <h1>Login for artists</h1>
                    <div>
                    Nombre Artista: <input type="text" name="nomArtista" >
                    </div>
                    <br>

                    <div>
                    Contrase&ntilde;a: <input type="password" name="pass">
                    </div>
                    <br>

                    <input type="submit" value="Enviar" name="boton" >			
                    
                    <br>
            </form>
        </div>
    </div>    
    <?php
        $server="localhost";
        $user="root";
        $passw="";
        $basededatos="audios";

        if(isset($_POST['email'])){

            $mysqli=mysqli_connect($server,$user,$passw,$basededatos);

            if(!$mysqli){
                die("Fallo al establecer conexion" .mysqli_connect_error());
            }
            $email=$_POST['email'];
            $pass = $_POST['pass'];	
            $user = mysqli_query( $mysqli,"SELECT Nombre, Apellidos,rutaImg FROM usuario WHERE Email ='$email' AND Pass='$pass'");
            $cont=  mysqli_num_rows($user); 
            $columna= mysqli_fetch_array($user);
            
            $name=$columna['Nombre'];
            $apellidos=$columna['Apellidos'];
            if($columna['rutaImg']==NULL){
                $ImgSrc="../images/noPhoto.png";
            }else{
                $ImgSrc=$columna['rutaImg'];
            }
            
            if($cont==1){
                $_SESSION['Email']=$email;
                $_SESSION['Nombre']=$name;
                $_SESSION['Apellidos']=$apellidos;
                $_SESSION['Url']="../users/$email.xml";
                $_SESSION['ImgSrc']=$ImgSrc;
                $_SESSION['Tipo']="User";
                echo("<script> alert ('BIENVENIDO AL SISTEMA')</script>");
            }
            else {
                echo("Par&aacute;metros de login incorrectos ");
            } 


        }else if(isset($_POST['nomArtista'])){
            $mysqli=mysqli_connect($server,$user,$passw,$basededatos);

            if(!$mysqli){
                die("Fallo al establecer conexion" .mysqli_connect_error());
            }

            $nomArtista=$_POST['nomArtista'];
            $pass=$_POST['pass'];
            $user=mysqli_query($mysqli,"SELECT nomArtista FROM artista WHERE nomArtista='$nomArtista' AND pass='$pass'");
            
            $cont=  mysqli_num_rows($user); 
            $columna= mysqli_fetch_array($user);
            
            if($cont==1){
                $_SESSION['NomArtista']=$nomArtista;
                $_SESSION['Tipo']="Artista";
                echo("<script> alert ('BIENVENIDO AL SISTEMA')</script>");
            }else{
                echo("<p style='color:red'>Par&aacute;metros de login incorrectos </p>");
            }
        }

    ?>

    

  </section>
  
</body>
</html>