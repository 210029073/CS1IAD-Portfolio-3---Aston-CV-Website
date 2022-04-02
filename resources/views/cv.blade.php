<html>

    <head>
        <style>
            body
            {
                font-family: Arial, Helvetica, sans-serif;
                margin: auto;
                width: 60%;
            }
            table{
                width: 100%;
                border-collapse: collapse;
            }
            td,th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 10px;

            }

            tr:nth-child(even)
            {
                background-color: rgb(116, 227, 156);
            }

            section + section
            {
                margin-top: 5%;
            }

            footer{
                padding: 3.5%;
                background-color: #6b7280;
            }
        </style>
    </head>

    <body>
        <section>
            <div>

                <h2>{{ $cvs -> name  }}'s CV</h2>
                <p>CV Holder's Full Name:</p>
                <p>{{ $cvs->name }}</p>

                <br/>

                <p>CV Holder's Email Address:</p>
                <p> {{ $cvs->email }}</p>

                <br/>

                <p>CV Holder's Programming Language:</p>
                <p>{{ $cvs->keyprogramming }}</p>

                <br/>

                <p>CV Holder's Place of Education:</p>
{{--                <p>{{ $curriculumVitaes->education }}</p>--}}
                @foreach(explode(',', $cvs->education) as $fields)
                    <p>{{ $fields }}</p>
                @endforeach

            </div>
        </section>

        <section>
            <a href="../cvs">Go Back>></a>
        </section>
    </body>
</html>
