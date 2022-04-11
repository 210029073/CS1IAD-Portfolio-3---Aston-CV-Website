//switch function for hamburger menu
//for clicking the hamburger menu icon
function menuLoad() {
    //get the links html object
    let hmMenu = document.getElementById("links");

    //if the links are present, then hide them
    if(hmMenu.style.display === "none") {
        hmMenu.style.display = "inline-block";
        console.log("This should be clicked");
    }

    //otherwise, display the links
    else {
        hmMenu.style.display = "none";
    }
}

//hide the menu
function hideMenu() {
    //get the links html object
    let hmMenu = document.getElementById("links");
    hmMenu.style.display = "none";
}

//show the menu
function showMenu() {
    //get the links html object
    let hmMenu = document.getElementById("links");
    hmMenu.style.display = "inline-block";
}
