@extends('layouts.app')
<head>
</head>

        @section('currentCV')

            <section>
                <br/><br/>

                <div class="card rounded border-info" style="margin: auto; width: 60%;">
                    <h5 class="mt-3 p-3 text-lg-center">
                        Please include a comma at the end of each item per text field.
                    </h5>
                </div>

                <div class="card mt-lg-5" style="margin: auto; width: 60%;">

                    <div class="card-header">
                        <br/>
                        <h1 class="card-title" style="text-align: center">{!! $cvs->name !!}'s CV</h1>
                        <br/>
                    </div>
                    <div class="cvBody card-body" style="margin:auto;">

                         <h3 class="card-title">CV Holder's Full Name:</h3>
                            <p>{!! $cvs->name !!}</p>

                            <br/>

                        <form method="POST" action="update" id="regForm">
                            @csrf

                            {{--                    <label>Full Name</label>--}}
                            {{--                    <br/>--}}
                            {{--                    <input class="form-control" type="text" name="name" placeholder="Enter your full name" required/>--}}

                            {{--                    <br/>--}}
                            {{--                    <br/>--}}

                            <label>Your email is: </label>
                            <br/>
                            <input class="form-control" type="email" name="email" readonly placeholder="Enter your Email Address" value="{!! $cvs -> email !!}" required/>

                            <br/>
                            <br/>

                            <label>Key Programming Language</label>
                            <br/>
                            <textarea class="form-control" name="keyprogramming" form="regForm">{!! $cvs -> keyprogramming !!}</textarea>

                            <br/>
                            <br/>

                            <label>Education</label>
                            <br/>
                            <textarea class="form-control" name="education" form="regForm">{!! $cvs -> education !!}</textarea>

                            <br/>
                            <br/>

                            <label>Profile</label>
                            <br/>
                            <textarea class="form-control" name="profile" form="regForm">{!! $cvs->profile !!}</textarea>

                            <br/>
                            <br/>

                            <label>URL Links</label>
                            <br/>
                            <textarea class="form-control" name="URLlinks" form="regForm">{!! $cvs -> URLlinks !!}</textarea>
                            <br/>
                            <br/>

                            <div>
                                <input class="btn btn-primary" type="submit" value="Update"/>
                                <a class="btn btn-primary" href="../{!! $cvs->id !!}">Return to Normal View</a>
                                <a class="btn btn-primary" href="../../cvs">Return to Search</a>
                            </div>
                        </form>

                    </div>
                </div>
            </section>
        @endsection

        @yield('createCV')
