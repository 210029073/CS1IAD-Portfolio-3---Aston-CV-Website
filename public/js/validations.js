//AUTHOR: Ibrahim Ahmad (210029073)
//TITLE: validations.js
//DATE CREATED: 18/02/2022
//UPDATED ON: 14/04/2022

//references
//https://stackoverflow.com/questions/1531093/how-do-i-get-the-current-date-in-javascript

//this script will validate if both emails match
//which will therefore output an error message, plus an error message box within the page

//this will check if both emails match
function checkEmail() {
    let form = document.querySelector("#contactForm");
    let emailTyped = form.email.value;
    let confirmedEmail = form.confirmEmail.value;

    if (confirmedEmail === emailTyped && emailTyped.length > 0) {
        document.getElementById("errorEmail").style.display = "none";
        console.log("This was typed correctly");
    }
    if (confirmedEmail !== emailTyped && emailTyped.length > 0) {
        // document.getElementById("errorEmail").style.display = "block";
        document.getElementsByClassName("form-control")[1].style.display = "block";
        form.confirmEmail.setCustomValidity("Both emails do not match.\n" + "Please try again");
        console.log("please review your inputs!");
    }

}

//This will check if both phone numbers match
function checkPhone() {
    let form = document.querySelector("#contactForm");
    let phone = document.forms['contactForm']['phone'].value;
    let phoneTyped = document.forms['contactForm']['confirmPhone'].value;

    if (phoneTyped === phone && phoneTyped.length > 0) {
        document.getElementById("error").style.display = "none";
        console.log("This was typed correctly");
    }
    if (phoneTyped !== phone && phoneTyped.length > 0) {
        document.getElementById("error").style.display = "block";
        form.confirmPhone.setCustomValidity("Both emails do not match.\n" + "Please try again");
        console.log("please review your inputs!");
    }

}

//we check if the email is a day after todays date,
//and it must not be before today's date
//or even yesterdays date.
function validateDate() {
    let form = document.querySelector("#contactForm");
    let isDateValid = form.projectDate.value;

    //for more infomation about the date please visit: https://stackoverflow.com/questions/1531093/how-do-i-get-the-current-date-in-javascript
    let today = new Date().toISOString().slice(0, 10)

    console.log(today);
    console.log(isDateValid);

    if (isDateValid > today) {
        document.getElementById("error").style.display = "none";
        console.log("date is valid");
    } else {
        document.getElementById("error").style.display = "block";
        document.getElementById("error").style.transitionDelay = "1.2s";
        form.projectDate.setCustomValidity("You must set the date after todays date.")
        console.log("You cannot register an appointment at the same day, or the during the day before!");
    }

    // if (isDateValid < testDate) {
    //     console.log("You cannot register the appointment during the day before!")
    // }
}
