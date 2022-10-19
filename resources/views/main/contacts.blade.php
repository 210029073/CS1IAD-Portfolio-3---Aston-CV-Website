@extends('layouts.app')
<head>
    <title>Contacts</title>
    <script type="application/javascript"  src="{{asset('js/popup-window.js')}}"></script>
    <script src="{{asset('js/validations.js')}}"></script>
</head>
@section('contacts')

  <!-- <body onload="alert('Welcome to My Personal CV page!')"> -->

    <header>
      <div id="main-header">
          <h1 id="pgKey">Contact Me</h1>
          <p>
            If you wish to send enquiries to me regarding occuring projects
            based on an event you can contact me by entering your contacts
            details so that I will contact you through phone, email.
          </p>
          <p>
            My Contact Email is
            <a id="pEmail" href="mailto:210029073@aston.ac.uk"
              >210029073@aston.ac.uk</a
            >
          </p>
      </div>
    </header>

    <br/>
    <section>

        <!-- This is where the contact form will be stored -->
        <div class="card signUp-Form mt-5" style="margin:0 auto;width: 70%">
            <div class="card-body">
                <form id="contactForm">
                    <h3>Personal Details</h3>
                    <select class="form-control" id="initials" name="initials">
                        <option value="You Have not selected an initial yet!">
                            Please Select an Initial
                        </option>
                        <option value="Mr">Mr.</option>
                        <option value="Miss">Miss.</option>
                        <option value="Mrs">Mrs.</option>
                        <option value="Doctor">Dr.</option>
                        <option value="Professor">Professor.</option>
                    </select>
                    <br/>

                    <!-- form validation -->
                    <input type="text" class="form-control" id="fName" name="fName" placeholder="First Name" />

                    <br/>

                    <input type="text" class="form-control" name="sName" placeholder="Last Name" />

                    <br />
                    <br />

                    <h3>Contact Details</h3>
                    <!-- Form validation -->
                    <span class="form-check-label" id="errorEmail"
                    >Please check your emails, because they are not the same.</span
                    >
                    <br />

                    <input type="text" class="form-control" name="email" placeholder="E-Mail" />
                    <br />

                    <input
                        type="text"
                        class="form-control"
                        name="confirmEmail"
                        v-model="message"
                        placeholder="Confirm E-Mail"
                        onchange="checkEmail()"
                    />
                    <br />
                    <!-- Form validation -->
                    <span class="form-check-label" id="error"
                    >Please check your phone numbers, because they are not the same.</span
                    >

                    <br/>
                    <input type="text" class="form-control" name="phone" placeholder="Phone Number" />

                    <br />

                    <input
                        type="text"
                        class="form-control"
                        name="confirmPhone"
                        placeholder="Confirm Phone Number"
                        onchange="checkPhone()"
                    />

                    <br />
                    <br />

                    <!-- Date validation for the project date -->
                    <h4><em>Project Date</em></h4>
                    <span id="error"
                    >Please check your selected date, as you are only allowed to select
            appointments from a day after today's date.</span
                    >
                    <br />
                    <input type="date" class="form-control" name="projectDate" onchange="validateDate()" />
                    <br />
                    <br />

                    <h4><em>Preference of Contact</em></h4>
                    <select name="preferContact" class="form-control">
                        <option value="You have not selected a prefer way of contact yet!">
                            Please Select a Preferred way of Contact
                        </option>
                        <option value="Through SMS">Prefer Contact through SMS</option>
                        <option value="Through E-mail">
                            Prefer Contact through E-Mail
                        </option>
                        <option value="Through Phone">Prefer Contact through Phone</option>
                        <option value="Through Post">Prefer Contact through Post</option>
                    </select>

                    <br />
                    <br />
{{--                    <div>--}}
{{--                    <input id="checkBox" name="acceptedDeclaration" type="checkbox" />--}}

{{--                        <label class="form-check-label"--}}
{{--                        >I hereby <em>accept</em> that I will be establishing the means of--}}
{{--                            communication between the developer and any form of evidence and--}}
{{--                            contribution will therefore be made confidential, and must not be--}}
{{--                            distributed to anyone using optical mediums, as this will breach the--}}
{{--                            Copyright Designs and Patents act.</label--}}
{{--                        >--}}

{{--                    </div>--}}

                    <div id="checkBoxContainer">
                        <div>
                            <input id="checkBox" name="acceptedDeclaration" type="checkbox">
                        </div>
                        <div>
                            <label class="form-check-label">I hereby <em>accept</em> that I will be establishing the means of
                                communication between the developer and any form of evidence and
                                contribution will therefore be made confidential, and must not be
                                distributed to anyone using optical mediums, as this will breach the
                                Copyright Designs and Patents act.</label>
                        </div>
                    </div>
                    <br />
                    <br />

                    <button type="button" class="btn" id="btnSubmitRegister" onclick="submitContactDetails()">
                        Submit
                    </button>
                    <p id="submitMsg">Submitting</p>
                </form>
            </div>

        </div>

        <br />
        <br />
        <div id="container">
            <div class="signUpSum">
                <button type="button" class="exit" id="btnClose" onclick="closeButton()">
                    Close
                </button>
                <br />
                <br />
                <br />
                <div id="contact-me">
            <span
            >To:
              <a href="mailto:210029073@aston.ac.uk"
              >210029073@aston.ac.uk</a
              ></span
            >
                </div>
                <br />
                <div id="content" class="signUpSum-Container">
                    <h2>Here's the Contact Details in Summary</h2>
                </div>
                <br />
                <br />
                <button type="button" id="btnSubmit" onclick="submitContactDetails()">
                    Submit
                </button>
            </div>
        </div>
    </section>

    <br />
    <br />

@endsection
