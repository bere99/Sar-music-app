var timeTravelers = document.getElementsByClassName("timeTraveler");
var playButtons = document.getElementsByClassName("playButton-content");

var songsURL = [];

var actTimeTraveler;
var actPlayButton_Content;
var actIndex = -1;
var audio;

function startSong(selectedIndex) {
    if(selectedIndex == actIndex) {
        if(!audio.paused) {
            audio.pause();
            actPlayButton_Content.innerHTML = ">";
        } else {
            audio.play();
            actPlayButton_Content.innerHTML = "||";
        }
    } else {
        let url = songsURL[selectedIndex];
        if(audio != null) {
            audio.pause();
            actTimeTraveler.style.width = 0+"%";
            actPlayButton_Content.innerHTML = ">";
        }
        actIndex = selectedIndex;
        confAudioAndControls(url, selectedIndex);
        audio.play();
        actPlayButton_Content.innerHTML = "||";
    }
}

function confAudioAndControls(url, selectedIndex) {
    audio = new Audio("../audios/"+url);
    actTimeTraveler = timeTravelers[selectedIndex];
    actPlayButton_Content = playButtons[selectedIndex];

    audio.addEventListener("timeupdate", ()=>{
        let aux = (100*audio.currentTime)/audio.duration;
        actTimeTraveler.style.width = aux+"%"; 
    });

    audio.addEventListener("ended", ()=>{
        actTimeTraveler.style.width = 0+"%";
    });
}