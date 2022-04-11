//AUTHOR: Ibrahim Ahmad (210029073)
//TITLE: alterBtnLabel.js
//DATE: 19/02/2022

//This will alter the Current page button located at the navigation bar
//to corresponding page name
function changeButtonLbl() {
  let switcher = document.getElementById("switch");
  let pgName = document.querySelector("#pgKey").innerHTML;
  switcher.innerHTML = pgName;
  console.log("Changed the Current Page button to " + pgName);
}

//This will change the Current page within the navigation bar
//back to its original label
function changeToOriginLbl() {
  let switcher = document.getElementById("switch");
  switcher.innerHTML = "Current Page";
  console.log("\nChanged the Current Page button back to " + switcher.innerHTML);
}