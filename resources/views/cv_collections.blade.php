@extends('layouts.app')

<head>
    <style>
        div+div{
            margin-top: 3rem;
            -top: 3rem;
            border-top: 1px solid #6b7280;
        }
    </style>
</head>

@section('cvCollection')

    <table>
        <tr>
            <th>Full Name</th>
            <th>Email Address</th>
            <th>Programming Languages</th>
            <th>Education</th>
        </tr>
        @foreach ($cvCollections as $single)
            <tr>
                <td>{{ $single->name }}</td>
                <td>{{ $single->email }}</td>
                <td>{{ $single->keyprogramming }}</td>
                {{--            <td>{{ $single->education }}</td>--}}
                <td>
                    @foreach(explode(',', $single->education) as $fields)
                        <p>{{ $fields }}</p>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>

@endsection

@section('query')

    <h1>Search</h1>
    <form method="GET" action="#">
        <input name="search" placeholder="Search results"/>
        <input type="reset" onclick="window.location.replace('cvs')"/>
        <input type="submit" value="Search"/>
    </form>
@endsection

@section('cvCollectionSummary')

    @if(empty($_GET['search']))
        @yield('query')
    @endif

    @if(!empty($_GET['search']))

        <div id="searchBar">
            @yield('query')
        </div>

        @foreach ($cvCollections as $single)

            <div>

                <a href="cvs/{{$single -> id}}"><h2>{{ $single -> name  }}'s CV</h2></a>
                <p>CV Holder's Full Name:</p>
                <p>{{ $single->name }}</p>

                <br/>

                <p>CV Holder's Email Address:</p>
                <p> {{ $single->email }}</p>

                <br/>

                <p>CV Holder's Programming Language:</p>
                <p>{{ $single->keyprogramming }}</p>

                <br/>

                <p>CV Holder's Place of Education:</p>
                @foreach(explode(',', $single->education) as $fields)
                    <p>{{ $fields }}</p>
                @endforeach
            </div>
        @endforeach
        {{$cvCollections->links()}}

    @endif

@endsection
