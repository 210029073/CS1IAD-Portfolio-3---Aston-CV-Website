//AUTHOR: Ibrahim Ahmad (210029073)
//TITLE: popup-window.js
//DATE CREATED: 13/02/2022
//UPDATED ON: 14/04/2022

//Displays the Contact Details as a Summary (works on php blade)
function submitContactDetails()
{
    //gain access to the button
    let input = confirm("Do you wish to proceed?");

    if (input)
    {
        let initials = document.forms['contactForm']['initials'].value;
        let fNames = document.forms['contactForm']['fName'].value;
        let sName = document.forms['contactForm']['sName'].value;

        //
        let email = document.forms['contactForm']['email'].value;
        let confirmEmail = document.forms['contactForm']['confirmEmail'].value;

        let phoneNumber = document.forms['contactForm']['phone'].value;
        let confirmedPhoneNumber = document.forms['contactForm']['confirmPhone'].value;

        let preferredContact = document.forms['contactForm']['preferContact'].value;

        let isChecked = document.getElementById("checkBox").checked;

        let checkDetails;

        document.getElementById("submitMsg").style.display = "inline";

        if (isChecked)
        {
             checkDetails = confirm(
                 "=============================\n" +
                "Contact Details in Summary" +
                 "\n=============================" + "\n\n" +
                 "Your Initials are: " + initials + "\n" +
                 "\nYour First Name is: " + fNames + "\n" +
                 "\nYour Last Name is: " + sName +
                "\n" + "\nYour First Email is: " + email + "\n" +
                 "\nYour Confirmed Email is: " + confirmEmail + "\n" +
                 "\nYour Phone Number is: " + phoneNumber + "\n" +
                 "\nYour Confirmed phone number is: " + confirmedPhoneNumber + "\n" +
                 "\nYour Preferred Contact is: " + preferredContact + "\n" +
                 "\nIs Contract Signed: Is Signed."
             );
        } else
        {
             checkDetails = confirm(
                 "=============================\n" +
                "Contact Details in Summary" +
                 "\n=============================" + "\n\n" +
                 "Your Initials are: " + initials + "\n" +
                 "\nYour First Name is: " + fNames + "\n" +
                 "\nYour Last Name is: " + "\n" + sName + "\n" +
                 "\nYour Email is: " + email + "\n" +
                 "\nYour Confirmed Email is: " + confirmEmail + "\n" +
                 "\nYour Phone Number is: " + phoneNumber + "\n" +
                 "\nYour Confirmed phone number is: " + confirmedPhoneNumber + "\n" +
                 "\nYour Preferred Contact is: "  + preferredContact + "\n" +
                 "\nIs Contract Signed: Not Signed."
             );
        }


        if(checkDetails) {
            alert("Successfully submitted contact details.");
            window.location.reload();
        }

        if(!checkDetails) {

            document.getElementById("submitMsg").style.display = "none";

        }
    } else
    {
        document.getElementById("submitMsg").style.display = "none";
    }

}
