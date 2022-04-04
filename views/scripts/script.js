function switcher(val) {
    var value = val.value;
    document.getElementById("selection1").style.display = "none";
    document.getElementById("selection2").style.display = "none";
    document.getElementById("selection3").style.display = "none";
    document.getElementById("selection" + value).style.display = "block";
}

