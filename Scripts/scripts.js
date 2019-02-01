function openclose(id) {
    var subnav = document.getElementById(id);
    var stat = subnav.getAttribute("status");
    if(stat == "open") {
        subnav.setAttribute("status", "closed");
    } else {
        subnav.setAttribute("status", "open");
    }
}