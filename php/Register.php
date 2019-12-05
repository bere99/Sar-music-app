<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
 
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div class="row">

        <div class="column" style="background-color:#aaa;">
            
            <form action="Register.php" method="post" enctype="multipart/form-data">
                <h1>Register</h1>        
                    <br>
                    Email: <input type="email" name="email" id="email" required>

                    <br>
                    Nombre y Apellido: <input type="text" name="name" pattern="^.+ .+$" required>
                    <br>		
                    Contrase&ntilde;a: <input type="password" id="pass" name="pass" pattern=".+"/ required>  

                    <br>
                    Repetir Contrase&ntilde;a: <input type="password" name="pass2" pattern=".+"/ required> 
                        <br>
                    <input id="file-input" name="file-input" type="file"/>
                        <br>          			
                    <input type="submit" id="boton" value="Enviar" name="boton" >						
            </form>
        </div>

        <div class="column" style="background-color:#aaa;">
            <form action="Register.php" method="post" enctype="multipart/form-data">
                <h1>Register for artists</h1>        
                    <br>
                    Email: <input type="email" name="email" id="email" required>
                    <br>
                    Nombre de artista: <input type="text" name="nomArtista" required>
                    <br>		
                    Contrase&ntilde;a: <input type="password" id="pass" name="pass" pattern=".+"/ required>  
                    <br>
                    Repetir Contrase&ntilde;a: <input type="password" name="pass2" pattern=".+"/ required> 
                        <br>
                    <input id="file-input" name="file-input" type="file"/>
                        <br>          			
                    <input type="submit" id="boton" value="Enviar" name="boton"  >						
            </form>
        </div>
    </div>

    <?php

    

        if(isset($_POST['email'])){

            $server="localhost";
            $user="root";
            $passw="";
            $basededatos="audios";

            $pass= $_POST['pass'];
            $rpass= $_POST['pass2'];
            $email=$_POST['email'];

            if($pass!=$rpass){
                echo"Las contraseñas no coinciden";
            }else{
                $mysqli=mysqli_connect($server,$user,$passw,$basededatos);

                if(!$mysqli){	
                    die("Fallo al establecer conexion" .mysqli_connect_error());
                }

                $nombreFoto=$_FILES['file-input']['name'];
                if($nombreFoto!=""){
                    $rutaImg="../images/".$nombreFoto;
                    move_uploaded_file($_FILES['file-input']['tmp_name'],$rutaImg);
                }else{
                    $rutaImg=NULL;
                }
               

                if(isset($_POST['name'])){        
                    $name=$_POST['name'];
                    
                    mysqli_query( $mysqli,"INSERT INTO USUARIO (Email, Nombre,Apellidos, Pass,rutaImg) VALUES ('$email','$name', '$pass','$rutaImg')");
                

                    $url="{$email}.xml";
                    $objetoXML=new XMLWriter();
                    $objetoXML->openURI($url);
                    $objetoXML->setIndent(true);
                    $objetoXML->startElement("user");
                    $objetoXML->startElement("userinfo");
                    $objetoXML->writeElement("name", $email);
                    $objetoXML->endElement();
                    $objetoXML->startElement("playlists");
                    $objetoXML->endElement();
                    $objetoXML->endElement();
                    $objetoXML->endDocument();
                    $objetoXML->flush();
                    unset($objetoXML);
                    rename("./$email.xml","../users/$email.xml");

          
                
                
                }else if(isset($_POST['nomArtista'])){
                    $nomArtista=$_POST['nomArtista'];
                    mysqli_query( $mysqli,"INSERT INTO ARTISTA (Correo,nomArtista, Pass, rutaImg) VALUES ('$email', '$nomArtista','$pass','$rutaImg')");
                }
                //Error de violación de clave primaria.
                if (mysqli_errno($mysqli) == 1062) {
                    echo("<script> alert ('No se ha podido registrar el usuario.')</script>");
                }else{
                    echo("<script> alert ('El usuario se ha registrado correctamente.')</script>");
                    mysqli_commit($mysqli);
                }

                mysqli_close( $mysqli);
            }
        }
    ?>


    </section>
    
</body>
</html>