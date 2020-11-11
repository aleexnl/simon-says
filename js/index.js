let buttons = document.getElementsByTagName("button");
let hoverAudio = document.getElementById("hoverAudio");

for (const button of buttons) {
    button.addEventListener("mouseover", function (event) {
        hoverAudio.play();
    });
}