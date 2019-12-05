var container = document.getElementsByClassName("wrapper");

function getAllAudios() {
    $.ajax({
        type: "POST",
        url: "../php/GetAllAudios.php",
        data: {},
        success: function(result) {
            let parser = new DOMParser();
            let xmlDoc = parser.parseFromString(result,"text/xml");
            let songs = xmlDoc.getElementsByTagName("song");
            for(let i=0; i<songs.length; i++) {
                let song = songs[i];
                addSongCard(song, i);
            }
        },
        error: function(result) {
            alert("Mierda");
        }
    });
}

function addSongCard(song, index) {
    let titulo = song.getElementsByTagName("titulo")[0].childNodes[0].nodeValue;
    let autor = song.getElementsByTagName("autor")[0].childNodes[0].nodeValue;
    let extension = song.getElementsByTagName("extension")[0].childNodes[0].nodeValue;
    let image = song.getElementsByTagName("image")[0].childNodes[0].nodeValue;
    let card = "";
    card += '<div class="sngCard">';
        card += '<div class="sngInfo">';
            card += '<img width="100" height="100" src="../images/'+image+'"/>';
            card += '<h3>'+titulo+'</h3>';
            card += '<h4>'+autor+'</h4>';
        card += '</div>'; 
        card += '<div class="controler">';
            card += '<div class="timeTravelerContainer">';
                card += '<div class="timeTraveler"></div>';
            card += '</div>';
            card += '<div class="playButtonContainer">';
                card += '<div id="'+index+' "class="playButton" onclick="startSong('+index+')">';
                    card += '<div class="playButton-content">></div>';
                card += '</div>';
            card += '</div>';
        card += '</div>';
    card += '</div>';
    songsURL.push(autor+"-"+titulo+extension+"\n");
    container[0].innerHTML += card;
}