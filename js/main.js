function CloseMenu() {
    const sideBar = document.getElementById("sideBar");
    sideBar.classList.toggle("hide");
    if(sideBar.classList.contains("hide")) {
        document.getElementById("main-content").style.marginLeft = "0";
    }else{
        document.getElementById("main-content").style.marginLeft = "250px";
    }
}