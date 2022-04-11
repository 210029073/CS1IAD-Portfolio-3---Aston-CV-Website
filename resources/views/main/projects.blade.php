@extends('layouts.app')
@section('projects')

  <!-- <body onload="alert('Welcome to My Personal CV page!')"> -->

    <header>
      <div id="main-header">
          <h1 id="pgKey">Projects</h1>
          <p>
            These are the projects which I have contributed within my career.
          </p>
      </div>
    </header>

    <br />

    <article>
      <div id="container" class="projects">
        <div id="project">
          <div id="previousProjects">
            <h3>My Previous Projects</h3>

            <div>
              <h4>Trip Quote Booking System</h4>
              <p>
                Trip Booking System for booking Drayton Manor trips created in
                Microsoft Excel. The following spreadsheet will automate
                calculations for a simple trip quote which will therefore log
                the following trip quote in an order sheet, in which which will
                provide the functionality of printing an invoice to the client.
                The trip quote booking system includes graphs which have been
                analysed from the previous trip quotes from the past years, for
                providing insights to the Marketting department for which
                department books the most trips.
              </p>
              <img
                src="PNG/spreadsheet.PNG"
                height="300"
                width="100%"
                alt="Trip Quote Booking for Joseph Chamberlain Sixth Form College in Microsoft Excel"
              />
            </div>

            <div>
              <h4>
                Coursework - Website Created for Westlake College (Fictional
                College)
              </h4>
              <p>
                Website created for Westlake College as part of coursework. This
                website provides features that a normal website that an average
                institute will therefore provide such as the location of the
                college, using Google Maps for allowing other students to be
                able to locate the destination of the college and the available
                public services around their area. The website includes various
                agents that incorporate a user-friendly interface within the
                site/
              </p>
              <img
                src="PNG/website.png"
                height="300"
                width="100%"
                alt="College Website for Promoting a Fictional College"
              />
            </div>

            <div>
              <h4>Simple Ordering System created for a dessert parlour</h4>
              <p>
                Desserts Program created for a Dessert Parlour in VB.NET This
                will automate the task of performing the calculations, as well
                as printing the receipt for the customer that is requesting an
                order. Clearing the previously filled orders, for the upcomming
                orders.
              </p>
              <img
                src="PNG/vb.png"
                height="300"
                width="100%"
                alt="Dessert Parlour order system"
              />
            </div>
          </div>

          <div id="currentProjects">
            <h3>My Current Projects that I am currently working on</h3>

            <div>
              <h4>
                Calculator application that incorporates arithmetic operations
              </h4>
              <p>
                Attempting the creation of a calculator for calculating simple
                sums using the JavaFX libraries in Java. This calculator app
                will print values using the double data type, due to its
                precision mechanisms that it provides for a greater degree of
                accuracy. However, this app lacks other features that a normal
                calculator will have, and that is by incorporating other
                operators that it will accept to perform various arithmetic
                operations.
              </p>
              <img
                src="PNG/javaFX_APP.PNG"
                height="250"
                width="100%"
                alt="Calculator Application written in JavaFX."
              />
            </div>

            <div>
              <h4>Payroll database system</h4>
              <p>
                Creating a payroll database using mySQL. I am currently finding
                a way that the user will be able to interact with the database
                without requiring the need to use MySQL workbench and that is by
                using the C/C++ connectors, and Java connectors for establishing
                a connection with MySQL.
              </p>
              <img
                src="PNG/mysql.PNG"
                height="300"
                width="100%"
                alt="Payroll Database in mySQL"
              />
            </div>
          </div>
        </div>
      </div>
    </article>
    <br />
    <br />
    <script src="JS/alterBtnLabel.js"></script>
@endsection
