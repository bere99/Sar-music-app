<?php
session_start():
?>
<!DOCTYPE html>
<html>
	<head>
        <?php include '../html/Head.html'?>
		<title>Subir archivo de audio</title>
		<meta charset="UTF-8">
	</head>
	<body>
       
        <?php include '../php/Menus.php' ?>
        <section class="main" id="s1"> 
        <h1>Subir nuevo audio:</h1>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            Autor: <input id="autor" name="autor" type="text"/>
            <br>
            Título: <input id="titulo" name="titulo" type="text"/>
            <br>
            <br> 
            <input id="file-input" name="file-input" type="file"/>
            <br>
            <br>
            Comentario: <input id="comentario" name="comentario" type="text"/>
            <br>
            
            <input type="radio"  value="Rock">Rock</input>
            <input type="radio"  value="Pop">Pop</input>
            <input type="radio"  value="Indie">Indie</input>
            <input type="radio"  value="K-Pop">Kpop</input>
            <input type="radio"  value="EDM">EDM</input>
            <input type="radio"  value="Jazz">Jazz</input>
            <input type="radio"  value="Metal">Metal</input>
            <input type="radio"  value="K-Pop">Kpop</input>
            <input type="radio"  value="Blues">Blues</input>
            
            <input type="submit" value="Subir"/>
        </form>
        
        <?php

            if(isset($_POST['titulo'])){

                //Validar campos
                $autor=$_POST['autor'];
                $titulo=$_POST['titulo'];
                $comentario=$_POST['comentario'];
                $extension=substr($_FILES['file-input']['name'],-4);
                
                if( (strcmp($comentario,"")==0 ) || (strcmp($autor,"")==0) ){
                    echo"<script>alert('Se deben completar todos los campos')</script>";
                }else if($_FILES['file-input']['error']==4){
                    echo"<script>alert('No se ha añadido ningun audio')</script>";
                }else if( (strcmp($extension,".mp3") != 0) && (strcmp($extension,".wav") != 0) && (strcmp($extension,".ogg") != 0) ){
                    echo"<script>alert('El formato del archivo no está soportado por el sistema')</script>";
                }else{
    
                    //Mover archivo de audio a carpeta de audios.
                    
                    $ruta="../audios/".$autor . "-" . $titulo.$extension;
                    move_uploaded_file($_FILES['file-input']['tmp_name'],$ruta);

                    //Añadir al xml
                    $audios=simplexml_load_file('../xml/audios.xml');

                    $audios['ultid']=$audios['ultid']+1;
                    $id=$audios['ultid'];
                    
                    $audio=$audios->addChild('audio');
                    $audio->addAttribute('id',$id);
                    $audio->addChild('fecha',date("Y/m/d H:i"));
                    $audio->addChild('autor',$autor);
                    $audio->addChild('titulo',$titulo);
                    $audio->addChild('comentario',$comentario);
                    $audio->addChild('extension',$extension);

                    if(!$audios->asXML('../xml/audios.xml')){
                        echo "Ha ocurrido un problema al guardar el audio.";
                    }
                    echo"<script>alert('El audio se ha añadido correctamente.')</script>";
                    
                }
            }
        ?>

        </section>

    </body>
</html>     














