function colorControl() {
    let colorSwitch = document.getElementById("chBox");
    console.log(colorSwitch.checked);
    if (colorSwitch.checked == true){
        document.getElementById("title").style.color = "#a48100";
        document.getElementsByClassName("box")[0].style.backgroundColor = "#a88500";
    } else {
        document.getElementById("title").style.color = "#e44024";
        document.getElementsByClassName("box")[0].style.backgroundColor = "#821f0b";
    }
}