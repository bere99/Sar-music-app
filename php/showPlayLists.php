<?php
    session_start();
?>
<html>
    <head>
        <title>Mostrar PlayList</title>
        <link rel="stylesheet" type="text/css" href="../css/plList.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <div id="plList">
                <?php
                    $user = simplexml_load_file('../xml/' . $_SESSION['Url']);
                    foreach ($user->playlists->playlist as $playlist){
                        echo '<div class="plButton" id="'.$playlist['name'].'">'.$playlist['name'].'</div>';
                    }
                ?>
            </div>
            <div id="sngListContainer">
                <div id="controlerContainer">
                    <img width="166" height="166" id="sngImage" src="../images/image.png"/>
                    <div id="controler">
                        <div id="sngInfo">
                            <h2 id="name"></h2>
                            <h3 id="autor"></h3>
                        </div>
                        <div id="timeTraveler"></div>
                        <div id="controlButtons">
                            <div class="controlButton" onclick="controlAudio(0)">
                                <span class="control-content">|&lt;</span>
                            </div>
                            <div class="controlButton" onclick="controlAudio(1)">
                                <span class="control-content">&gt;</span>
                            </div>
                            <div class="controlButton" onclick="controlAudio(2)">
                                <span class="control-content">&gt;|</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="sngList">
                </div>
            </div>
        </div>
        <script src="../js/audioControler.js"></script>
        <script src="../js/sendPlayListRequest.js"></script>
    </body>
</html>
