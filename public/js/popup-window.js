//AUTHOR: Ibrahim Ahmad (210029073)
//TITLE: popup-window.js
//DATE: 13/02/2022

//declaring variables
//retrieve model
let modal = document.querySelector(".signUpSum");
//retrieve models Contents
let content = document.getElementsByClassName("signUpSum")[0];

//retrieve form
let form = document.querySelector("#contactForm");

function viewSummary() {
    let content = document.getElementById("content");
    let confirmed = confirm("Do you wish to continue?");
    if (content && confirmed) {
        // //retrieve form properties

        let initials = form.initials.value;
        let fNames = form.fName.value;
        let sName = form.sName.value;
        //
        let email = form.email.value;
        let confirmEmail = form.confirmEmail.value;

        let phoneNumber = form.phone.value;
        let confirmedPhoneNumber = form.confirmPhone.value;

        let preferredContact = form.preferContact.value;

        let acceptedDeclaration = form.acceptedDeclaration.value;

        //create new elements
        let initial = document.createElement("p");
        let name1 = document.createElement("p");
        let name2 = document.createElement("p");
        let firstEmail = document.createElement("p");
        let secondEmail = document.createElement("p");
        let phone = document.createElement("p");
        let secondPhone = document.createElement("p");
        let typeContact = document.createElement("p");
        let contract = document.createElement("p");
        
        //insert elements
        initial.insertAdjacentHTML
                (
                        "beforeend",
                        "Your Initials are: " + initials
                        );

        name1.insertAdjacentHTML(
                "beforeend",
                "Your First Name is: " + fNames
                );

        name2.insertAdjacentHTML
                (
                        "beforeend",
                        "Your Last Name is: " + sName
                        );

        firstEmail.insertAdjacentHTML
                (
                        "beforeend",
                        "Email: " + email
                        );

        secondEmail.insertAdjacentHTML
                (
                        "beforeend",
                        "Confirmed Email is: " + confirmEmail
                        );

        phone.insertAdjacentHTML
                (
                        "beforeend",
                        "Contact Number is: " + phoneNumber
                        );

        secondPhone.insertAdjacentHTML
                (
                        "beforeend",
                        "Confirmed Contact Number is: " + confirmedPhoneNumber
                        );

        typeContact.insertAdjacentHTML
                (
                        "beforeend",
                        "Preferred type of contact is: " + preferredContact
                        );

        let isChecked = document.getElementById("checkBox").checked;
        if (isChecked)
        {
            contract.insertAdjacentHTML
                    (
                            "beforeend",
                            "Is Contract Signed: " + " Is Signed, and Accepted."
                            );
        } else
        {
            contract.insertAdjacentHTML
                    (
                            "beforeend",
                            "Is Contract Signed: " + " Not Signed yet, or is Declined."
                            );
        }


        console.log(sName);

        //append changes
        content.appendChild(initial);
        content.appendChild(name1);
        content.appendChild(name2);
        content.appendChild(firstEmail);
        content.appendChild(secondEmail);
        content.appendChild(phone);
        content.appendChild(secondPhone);
        content.appendChild(typeContact);
        content.appendChild(contract);

        //display the modal
        modal.style.display = "block";
        document.getElementById("submitMsg").style.display = "inline";
    } else
    {
    }
    // return ""
}

function submitContactDetails()
{
    //gain access to the button
    let input = confirm("Do you wish to proceed?");
    if (input)
    {
        alert("Successfully submitted contact details.");
        window.location.reload();
    } else
    {

    }

}

content.onclick = function closeButton() {
    modal.style.display = "none";
    let msg = document.getElementById("submitMsg");
    msg.style.display = "none";
};
