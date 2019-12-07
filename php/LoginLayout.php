<?php 
    session_start();
?>
<html>
    <head>
        <?php include '../html/Head.html'?>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body>
        <?php include '../php/Menus.php' ?>
        <div class="wrapper"> 
            <div id="loginUser" class="loginTypeButton" >Login</div>
            <div id="loginArtist" class="loginTypeButton" >Login for Artists</div>
            <div class="loginForm">
                <input type="email" id="email" placeholder="Email" />
                <input type="password" id="pass" placeholder="Password"/>
                <div id="upload">LOGIN</div>
            </div>
        </div> 
        <script src="../js/loginControler.js"></script>
        <script> 
    </body>
</html>