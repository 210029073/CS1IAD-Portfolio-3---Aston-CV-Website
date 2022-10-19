@extends('layouts.app')

<head>

    <title>Search for CVs</title>

    <style>
        div+div{
            margin-top: 3rem;
            -top: 3rem;
            border-top: 1px solid #6b7280;
        }

        #searchBar > h1
        {
            line-height: 1rem;
            text-align: center;
        }

        #searchBar{
            padding: 150px;
            margin: auto;
            width: 100%;
            background-color: lightgrey;
        }

        #searchBar > form > input {
            width: 100%;
        }

        #searchBar > form > div {
            width: 100%;
            margin: auto;
            text-align: center;
        }


        #searchBar > form > div > input {

            margin: 1.25% 1%;

        }

        #searchContainer
        {

            line-height: 1rem;
            margin: auto;
            width: 80%;
        }

        .card-container
        {
            display: flex;
            flex-wrap:wrap;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

@section('query')
    <div id="searchBar">
        <h1>Search for CVs</h1>
        <br/>
        <form method="GET" action="#">
            <input class="form-control" name="search" placeholder="Search results" required/>
            <br/>
            <div>
                <input class="btn btn-primary" type="submit" value="Search"/>
                <input class="btn btn-primary" type="reset" onclick="window.location.replace('cvs')"/>
            </div>
        </form>
    </div>
@endsection

@section('cvCollectionSummary')

    @if(empty($_GET['search']))
        @yield('query')
    @endif

    @if(!empty($_GET['search']))
        @yield('query')

        <br/>
        <div id="searchContainer">
            <hr/>
            <h1>You have currently searched  '{{$_GET['search']}}'</h1>

            <hr/>
        <br/>
        <div class="card-container">
        @foreach ($cvCollections as $single)
            <div class="card" >
                <div class="card-body">
                <a class="card-title" href="cvs/{{$single -> id}}"><h2>{{ $single -> name  }}'s CV</h2></a>
                <h3 class="">CV Holder's Full Name:</h3>
                <p class="card-text">{{ $single->name }}</p>

                <br/>

                <h3 class="">CV Holder's Email Address:</h3>
                <p class="card-text"> {{ $single->email }}</p>

                <br/>

                <h3 class="">CV Holder's Programming Language:</h3>
                    <ul>
                    @foreach(explode(',', $single->keyprogramming) as $fields)
                            <li class="card-text">{{ $fields }}</li>
                        @endforeach
                    </ul>
{{--                <p class="card-text">{{ $single->keyprogramming }}</p>--}}

                <br/>

                <h3 class="">CV Holder's Place of Education:</h3>
                    <ul>
                @foreach(explode(',', $single->education) as $fields)
                        <li class="card-text">{{ $fields }}</li>
                @endforeach
                    </ul>
                    <button class="btn btn-primary" onclick="window.location.replace('cvs/{{$single->id}}')">Visit CV</button>
                    <a class="btn btn-primary" href="cvs/{!! $single -> id !!}/update">Edit CV</a>
                </div>
            </div>
            @endforeach
        </div>
            <br/><br/>
            <br/><br/>
            {{$cvCollections->links()}}

        </div>

    @endif

@endsection
