@extends('layouts.app')
<head>
    <title>{{$cvs -> name}}'s CV</title>
</head>

        @section('currentCV')

            <section>
                <br/><br/>
                <div class="card mt-lg-5" style="margin: auto; width: 60%;">

                    <div class="card-header">
                        <br/>
                        <h1 class="card-title" style="text-align: center">{{ $cvs -> name  }}'s CV Summary</h1>
                        <br/>
                    </div>
                    <div class="cvBody card-body" style="margin:auto;">

                         <h3 class="card-title">CV Holder's Full Name:</h3>
                            <p>{{ $cvs->name }}</p>

                            <br/>

                            <h3 class="card-title">CV Holder's Email Address:</h3>
                            <p class="card-text"> {{ $cvs->email }}</p>

                            <br/>

                            <h3 class="card-title">CV Holder's Programming Language:</h3>
                            <ul>
                                @foreach(explode(',', $cvs->keyprogramming) as $field)
                                    <li class="card-text">{{$field}}</li>
                                @endforeach
                            </ul>
                            <br/>

                            <h3 class="card-title">CV Holder's Place of Education:</h3>
                            <ul>
                                @foreach(explode(',', $cvs->education) as $fields)
                                    <li>{{ $fields }}</li>
                                @endforeach
                            </ul>

                        <br/>

                        <h3 class="card-title">CV Holder's Profile</h3>
                        @foreach(explode(',', $cvs->profile) as $fields)
                            <li>{{ $fields }}</li>
                        @endforeach

                        <br/>

                        <h3 class="card-title">CV Holder's URL links</h3>
                        @foreach(explode(',', $cvs->URLlinks) as $fields)
                            <li><a href="{{ $fields }}">{{ $fields }}</a></li>
                        @endforeach

                        <br/>

                        <a class="btn btn-primary" href="../cvs">Return to Search</a>
                        <a class="btn btn-primary" href="{!! $cvs -> id !!}/update">Edit CV</a>
                    </div>
                </div>
            </section>
        @endsection

        @yield('createCV')
