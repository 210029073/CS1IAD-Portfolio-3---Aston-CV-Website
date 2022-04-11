@extends('layouts.app')

<head>
    <style>
        .card-container
        {
            width: 85%;
            margin: 0px auto;
            display: flex;
            flex-wrap:wrap;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            align-self: center;
        }

        .card {
            width: 45%;
            margin: 2.25%;
            transition-duration: 0.8s;
        }

        .card:hover{
            box-shadow: 5px 5px 5px gray;
            transition-duration: 0.8s;
        }
    </style>
</head>
@section('viewAll')
    <div class="card-container">
        @foreach ($all as $single)
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
                </div>
            </div>
        @endforeach
    </div>
    <br/><br/>
    <br/><br/>
    <div class="card-container">
        {{$all->links()}}
    </div>
@endsection
