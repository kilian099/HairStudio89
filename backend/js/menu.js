var navIcon = document.getElementById("nav-icon")
var navBar = document.getElementById("navbar")
var menu = document.getElementById("menu")

navBar.style.right = "-250px";

navIcon.onclick = function(){
    if(navBar.style.right == "-250px"){
        navBar.style.right = "0";
        navIcon.style.background = "#fff";
        navIcon.style.border = "1px solid #33200e";
        navIcon.style.borderRadius = "200px";
        menu.src = "/images/close.png";
    }
    else{
        navBar.style.right = "-250px";
        navIcon.style.background = "#33200e";
        menu.src = "/images/menu-icon.png";
    }

}