<!DOCTYPE html>
<html>

<head>
    <title>CV App</title>

    <style>
        body
        {
            font-family: Arial, Helvetica, sans-serif;
            margin: auto;
            width: 75%;
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
            bottom: 0;
            padding: 3.5%;
            background-color: #6b7280;
        }
    </style>
</head>

<body>
    <header>
        <h1>List of All CV Authors</h1>
    </header>

    {{-- Test to see if this works --}}
{{--    <section>--}}
{{--        <h2>Table Version</h2>--}}
{{--        @yield('cvCollection')--}}
{{--    </section>--}}

    <section>
        @yield('cvCollectionSummary')
    </section>


    <footer>
        <p>Written by Ibrahim Ahmad (210029073)</p>
    </footer>
</body>

</html>
