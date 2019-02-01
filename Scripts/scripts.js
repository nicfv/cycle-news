function subnav() {
    var sn = document.getElementById("subnav");
    var stat = sn.getAttribute("status");
    if(stat == "open") {
        sn.setAttribute("status", "closed");
    } else {
        sn.setAttribute("status", "open");
    }
}