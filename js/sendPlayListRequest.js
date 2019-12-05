/////////////////////////////////////////////////////////
var plButtons = document.getElementsByClassName("plButton");
var sngList = document.getElementById("sngList");
addClickEvent(plButtons, (id)=>{
    sendToServer(id);
});
/////////////////////////////////////////////////////////////////////////

function sendToServer(playlistName) {
    $.ajax({
        type: "POST",
        url: "../php/getPlayListInfo.php",
        data: { 
            selectedPlayList: playlistName
        },
        success: function(result) {
            //Reinicializamos las variables
            songsURL = [];
            imageURL = [];
            sngList.innerHTML = "";
            //Interpretamos el xml del servidor
            let parser = new DOMParser();
            let xmlDoc = parser.parseFromString(result,"text/xml");
            let songs = xmlDoc.getElementsByTagName("song");
            //Por cada cancion se genera un boton
            for(let i=0; i<songs.length; i++) {
                let song = songs[i];
                addSngButton(song, i);
            }
            //Añadimos evento "click" a cada boton para empezar la cancion
            let sngButtons = document.getElementsByClassName("sngButton");
            addClickEvent(sngButtons, (id)=>{
                startSong(id);
            });
        },
        error: function(result) {
            alert("Mierda");
        }
    });
}

function addSngButton(song, index) {
    let titulo = song.getElementsByTagName("titulo")[0].childNodes[0].nodeValue;
    let autor = song.getElementsByTagName("autor")[0].childNodes[0].nodeValue;
    let extension = song.getElementsByTagName("extension")[0].childNodes[0].nodeValue;
    let image = song.getElementsByTagName("image")[0].childNodes[0].nodeValue;
    songsURL.push(autor+"-"+titulo+extension+"\n");
    imageURL.push(image+"\n");
    sngList.innerHTML += '<div class="sngButton" id="'+index+'">'+titulo+"("+autor+")"+"</div>";
}

function addClickEvent(objectArray, eventFunction) {
    for(let i=0; i<objectArray.length; i++) {
        let object = objectArray[i];
        object.addEventListener("click", function(event){       
            eventFunction(event.srcElement.id);
        });
    }
}