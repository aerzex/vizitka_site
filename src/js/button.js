var count = 0;
document.getElementById("mabatton").onclick = function() {
    count = count + 1;
    if(count%2 == 0) {
        document.getElementById("mabatton").innerHTML = "Нажми ещё раз";
    } else {
        var img = document.createElement("img");
        img.src = "src/images/freddy_jumpscare.webp";
        document.getElementById("demo").appendChild(img);
    }
}