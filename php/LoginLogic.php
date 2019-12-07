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
            $email=$mysqli->real_escape_string($email);
            $pass=$mysqli->real_escape_string($pass);
            $pass=crypt($pass,"badhum");
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
                echo "<script language=Javascript> location.href=\"Layout.php\"; </script>";
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
            $nomArtista=$mysqli->real_escape_string($nomArtista);
            $pass=$mysqli->real_escape_string($pass);
            $pass=crypt($pass,"badhum");
            $user=mysqli_query($mysqli,"SELECT nomArtista FROM artista WHERE nomArtista='$nomArtista' AND pass='$pass'");
            
            $cont=  mysqli_num_rows($user); 
            $columna= mysqli_fetch_array($user);
            
            if($cont==1){
                $_SESSION['NomArtista']=$nomArtista;
                $_SESSION['Tipo']="Artista";
                echo("<script> alert ('BIENVENIDO AL SISTEMA')</script>");
                echo "<script language=Javascript> location.href=\"Layout.php\"; </script>";
            }else{
                echo("<p style='color:red'>Par&aacute;metros de login incorrectos </p>");
            }
        }

    ?>