<?php
    echo '<songs>';
    $audios = simplexml_load_file('../xml/audios.xml');
    foreach($audios->audio as $audio) {
        echo '<song>';
        echo '<titulo>'.$audio->titulo.'</titulo>';
        echo '<autor>'.$audio->autor.'</autor>';
        echo '<extension>'.$audio->extension.'</extension>';
        echo '<image>'.$audio->image.'</image>';
        echo '</song>';
    }
    echo '</songs>';
?>