let colorSwitch = document.getElementById("chBox");
colorSwitch.onclick = colorControl();

function colorControl() {
    console.log(colorSwitch);
    if (colorSwitch.checked == true){
        console.log(colorSwitch);
        document.getElementById("title").style.color = "#a48100";
        document.getElementsByClassName("box")[0].style.backgroundColor = "#a88500";
    } else {
        document.getElementById("title").style.color = "#e44024";
        document.getElementsByClassName("box")[0].style.backgroundColor = "#821f0b";
    }
}