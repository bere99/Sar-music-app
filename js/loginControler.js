    var loginTypeButtons = document.getElementsByClassName("loginTypeButton");
    var email = document.getElementById("email");
    var password = document.getElementById("pass");
    var uploadButton = document.getElementById("upload");

    var loginType = 0;

    for(let i=0; i<loginTypeButtons.length; i++) {
        loginTypeButtons[i].addEventListener("click", ()=>{
            loginType = i;
            if(loginType == 0) {
                email.setAttribute("placeholder","Email");
                loginTypeButtons[1].style.borderBottomColor = "black";
                loginTypeButtons[1].style.borderBottomWidth = "1px";
                loginTypeButtons[0].style.borderBottomColor = "green";
                loginTypeButtons[0].style.borderBottomWidth = "4px";
            } else {
                email.setAttribute("placeholder","Nombre de Artista");
                loginTypeButtons[0].style.borderBottomColor = "black";
                loginTypeButtons[0].style.borderBottomWidth = "1px";
                loginTypeButtons[1].style.borderBottomColor = "green";
                loginTypeButtons[1].style.borderBottomWidth = "4px";
            }
            
        });
    }

    uploadButton.addEventListener("click", ()=> {
        let emailV = email.value;
        let passV = password.value;
        sendToServer(emailV, passV);
    });

function sendToServer(emailV, passV) {
    $.ajax({
        type: "POST",
        url: "../php/LoginLogic.php",
        data: { 
            email: emailV,
            pass: passV
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